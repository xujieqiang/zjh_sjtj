<?php

namespace app\index\controller;

use app\BaseController;
use app\index\model\Stuinfo;
use app\index\model\Stucaiji;
use app\index\model\Banjibianma;



use think\facade\Db;
use think\facade\View;
use think\facade\Session;
use think\facade\Request;



use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\FORMAT_TEXT;
//use think\exception\ValidateException;
//use think\Request;

class Teacher extends BaseController
{
	public function trspace($str = ' ')
	{
		$a = [];
		$a = explode(" ", $str);
		$b = [];
		$i = 0;
		foreach ($a as $key => $val) {
			if ($val != ' ') {
				$b[$i] = $val;
				$i++;
			}
		}
		return implode($b);
	}

	public function index()
	{
		return View::fetch();
	}
	public function teacherzhanghao()
	{
		$name1 = isset($_GET["name"]) ? $_GET["name"] : '';
		$name = $this->trspace($name1);
		$val = '';
		if ($name == '') {
			$val = "<input type=\"radio\" name=\"zhanghao\" value=\"\" checked />无账号";
		} else {
			$rs = Db::name('teacherinfo')->where('xingming', $name)->where('beizhu', null)->select();
			if (count($rs) == 0) {
				$val = "<input type=\"radio\" name=\"zhanghao\" value=\"0\" checked />无账号";
			} else {
				$i = 0;
				foreach ($rs as $key => $value) {
					if ($i == 2) {
						$val = $val . "<br />";
						$i = 0;
					}
					$val = $val . "<input type=\"radio\" value=\"" . $value['zhanghao'] . "\" name=\"zhanghao\"   />" . $value['zhanghao'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					$i++;
				}
			}
		}

		return $val;
	}

	public function shujucl()
	{
		$xm1 = Request::param('xm');
		$zhanghao = Request::param('zhanghao');

		$kemu[] = Request::param('kemu');
		$banji[] = Request::param('rs');

		$isbzr = Request::param('isbzr');




		$xm = $this->trspace($xm1);
		$xm_len = preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $xm);
		$msg = "";
		$i = 0;
		/*
			$rs_kk=Db::name('teacherinfo')->where('xingming',$xm)->select();
			if((count($rs_kk)>=1)  && ($zhanghao=="0"))
			{
				//$msg=$msg."网络原因，提交的数据不完整";
				$rskk1=Db::name('teacherinfo')->where('xingming',$xm)->find();
				$zhanghao=$rskk1['zhanghao'];
				//$i++;
			}
			$rskk1=Db::name('teacherinfo')->where('xingming',$xm)->find();
			$zhanghao=$rskk1['zhanghao'];
			*/
		/*	
			if( !$xm_len )
			{
				$msg=$msg."请填写真实姓名!<br />";
				$i++;
			}		
			*/

		if ($zhanghao == "0" || $zhanghao == "") {
			//$msg=$msg."网络原因，提交的数据不完整";
			//$i++;


			$rskk1 = Db::name('teacherinfo')->where('xingming', $xm)->find();
			if ($rskk1) {
				$zhanghao = $rskk1['zhanghao'];
			} else {
				$zhanghao = "";
			}

			//$i++;

		}

		if ($isbzr == "") {
			$msg = $msg . "最后一个框框没有填写<br />";
			$i++;
		}
		$banji_kemu[] = "";
		for ($kj = 701; $kj < 715; $kj++) {
			$t = strval($kj);
			$banji_kemu[$t] = "";
		}
		for ($kj = 801; $kj < 813; $kj++) {
			$t = strval($kj);
			$banji_kemu[$t] = "";
		}
		for ($kj = 901; $kj < 915; $kj++) {
			$t = strval($kj);
			$banji_kemu[$t] = "";
		}
		$kemu1[] = '';
		$ban1[] = '';
		////判断课程选择的问题
		if ($zhanghao != "" && $zhanghao != "0") {

			$k_xb[] = '';
			$b_xb[] = '';
			$j = 0;
			$k = 0;
			foreach ($kemu as $key => $val) {
				if ($val == null) {
					$msg = $msg . "没有选择课程！<br />";
					$i++;
					$k = 1;
				} else {
					foreach ($val as $key1 => $val1) {
						$kemu1[$j] = $val1;
						$j++;
					}
				}
			}
			if ($k == 0) {
				foreach ($banji as $key => $val) {

					foreach ($val as $key1 => $val1) {
						if ($val1 != "") {
							$ban1[$key1] = $val1;
						}
					}
				}
				unset($ban1[0]);

				$tagwai = 1;
				foreach ($ban1 as $key1 => $val1) {
					$tag = 0;
					foreach ($kemu1 as $key2 => $val2) {
						if ($key1 == $val2) {
							$tag = 1;
							break;
						}
					}
					if ($tag == 0) {
						$tagwai = 0;
						break;
					}
				}
				if ($tagwai == 0) {
					$msg = $msg . "复选框漏选！<br />";
					$i++;
				}
				$tagwai1 = 1;
				foreach ($kemu1 as $key1 => $val1) {
					$tag = 0;
					foreach ($ban1 as $key2 => $val2) {
						if ($key2 == $val1) {
							$tag = 1;
							break;
						}
					}
					if ($tag == 0) {
						$tagwai1 = 0;
						break;
					}
				}

				if ($tagwai1 == 0) {
					$msg = $msg . "班级填写遗漏！<br />";
					$i++;
				}
				$a[] = '';
				$a_j = 0;
				foreach ($ban1 as $key => $val) {
					$s = explode("@", $val);
					$tag = 1;

					///数据验证
					foreach ($s as $key1 => $temp) {
						$val1 = $this->trspace($temp);
						if (!is_numeric($val1)) {
							$tag = 0;
							$i++;
						} else {
							if (strlen($val1) != 3) {
								$tag = 0;
								$i++;
							} else {
								$x = substr($val1, 0, 1);
								if ($x != '7' && $x != '8'  && $x != '9') {
									$tag = 0;
									$i++;
								} else {
									$y = \substr($val1, 1, 2);
									if ($y != "00" && $y != "01" && $y != "02" && $y != "03" && $y != "04"  && $y != "05" && $y != "06" && $y != "07" && $y != "08" && $y != "09" && $y != "10" && $y != "11" && $y != "12" && $y != "13" && $y != "14") {
										$tag = 0;
										$i++;
									}
								}
							}
						}
					}

					if ($tag == 0) {
						$msg = $msg . "班级格式不正确！<br />";
					} else {
						////将数据中的700,800,900进行分解并装入到一个新的数组 下面是一行的数据
						foreach ($s as $key1 => $temp) {
							$val1 = $this->trspace($temp);
							if ($val1 != '700' && $val1 != '800' && $val1 != '900') {
								$a[$a_j] = $val1;
								$a_j++;
							}
							if ($val1 == '700') {
								for ($ij = 1; $ij < 15; $ij++) {
									if ($ij < 10) {
										$a[$a_j] = '70' . strval($ij);
										$a_j++;
									} else {
										$a[$a_j] = '7' . strval($ij);
										$a_j++;
									}
								}
							}
							if ($val1 == '800') {
								for ($ij = 1; $ij < 13; $ij++) {
									if ($ij < 10) {
										$a[$a_j] = '80' . strval($ij);
										$a_j++;
									} else {
										$a[$a_j] = '8' . strval($ij);
										$a_j++;
									}
								}
							}
							if ($val1 == '900') {
								for ($ij = 1; $ij < 15; $ij++) {
									if ($ij < 10) {
										$a[$a_j] = '90' . strval($ij);
										$a_j++;
									} else {
										$a[$a_j] = '9' . strval($ij);
										$a_j++;
									}
								}
							}
						}

						$b = array_unique($a);
						//dump($b);
						$a = array();
						$a_j = 0;

						foreach ($b as $key_lin => $val_lin) {
							//dump($val_lin);
							if ($banji_kemu[$val_lin] != "") {
								$banji_kemu[$val_lin] = $banji_kemu[$val_lin] . "," . $key;
							} else {
								$banji_kemu[$val_lin] = $key;
							}
						}
					}
				}

				foreach ($banji_kemu as $bjkm_key => $bjkm_val) {
					if ($bjkm_val == "") {
						unset($banji_kemu[$bjkm_key]);
					}
				}
				//dump($banji_kemu);

				////////////////////////////////////
			}
		}

		if ($isbzr != '否') {
			$bzr_tag = 0;
			if (!\is_numeric($isbzr) || strlen($isbzr) != 3) {
				$bzr_tag = 1;
				$i++;
			} else {
				$m = \substr($isbzr, 0, 1);
				if ($m != '7'  && $m != '8' && $m != '9') {
					$bzr_tag = 1;

					$i++;
				}
				$n = \substr($isbzr, 1, 2);
				if ($n != "00" && $n != "01" && $n != "02" && $n != "03" && $n != "04"  && $n != "05" && $n != "06" && $n != "07" && $n != "08" && $n != "09" && $n != "10" && $n != "11" && $n != "12" && $n != "13" && $n != "14") {
					$bzr_tag = 1;
					$i++;
				}
			}
			if ($bzr_tag == 1) {
				$msg = $msg . "最后一个框框的格式不对！<br />";
			}
		}




		$rs111 = Db::name('teacherinfo')->where('zhanghao', $zhanghao)->where('beizhu', '<>', null)->find();
		if ($rs111) {
			$msg = $msg . "已经记录，请不要重复上传！";
			$i++;
		}
		if ($i == 0) {
			$out_tag = 0;
			foreach ($banji_kemu as $keybj => $valbj) {
				$bjbm = Db::name('banjibianma')->where('banjijc', $keybj)->find();
				$data = [
					'zhanghao' => $zhanghao,
					'banjibianma' => $bjbm['banjibianma'],
					'kemu' => $valbj,
					'isbzr' => '否',
				];
				$fp = fopen("lock1.txt", "w+");
				if (flock($fp, LOCK_EX)) {
					$xrs = Db::name('teachercaiji')->save($data);
					Db::name('teacherinfo')->where('zhanghao', $zhanghao)->update(['beizhu' => '已经更新']);

					if ($xrs && $isbzr != '否') {
						$bjbm1 = Db::name('banjibianma')->where('banjijc', $isbzr)->find();
						$bzrsj = Db::name('teachercaiji')->where('zhanghao', $zhanghao)->where('banjibianma', $bjbm1['banjibianma'])->select();
						//$zh=Db::name('teacherinfo')->where('zhanghao',$zhanghao)->find();
						//$zh['beizhu']='已经更新';

						if (count($bzrsj) >= 1) {

							Db::name('teachercaiji')->where('zhanghao', $zhanghao)->where('banjibianma', $bjbm1['banjibianma'])->update(['isbzr' => '是']);
						}
					}
					if (!$xrs) {
						$msg = $msg . "网络原因上传失败！";
						$out_tag = 1;
					}
					flock($fp, LOCK_UN);
				}
				fclose($fp);
			}
			if ($out_tag == 0) {
				echo exit('<script>top.location.href="/zjhsjtj/public/index/teacher/successrs?xm=' . $zhanghao . '" </script>');
			}
		}
		$msg = "<font color='red'>" . $msg . "</font>";
		return $msg;
	}

	public function successrs()
	{
		$xm = $_GET['xm'];
		$rs = Db::name('teacherinfo')->where('zhanghao', $xm)->find();
		View::assign('xm', $rs['xingming']);
		return View::fetch();
	}


	public function save()
	{
		/*
			 $data = [
		    ['title1' => '11a1', 'title2' => 'b222'],
		    ['title1' => '11d1', 'title2' => '2c22'],
		    ['title1' => "330522918109301519", 'title2' => '22312312312312312312']
				//  ['title1' => "330522918109301519"."\t", 'title2' => 'f222'] 此方法可以防止身份证变成科学计数法
		];
		*/
		$title = ['id', '姓名', '账号', '班级编码', '性别', '身份证', '班级'];

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();


		//表头
		//设置单元格内容
		$titCol = 'A';
		foreach ($title as $key => $value) {
			// 单元格内容写入
			$sheet->setCellValue($titCol . '1', $value)->getColumnDimension($titCol)->setAutoSize(true);
			$titCol++;
		}
		$row = 2; // 从第二行开始   setWidth(30)
		$data = Db::name('stucaiji')->order('banjibianma', 'asc')->select();
		foreach ($data as $key1 => $item) {
			$dataCol = 'A';

			if ($item['id'] <= 1628) {
				continue;
			}
			foreach ($item as $key => $value) {
				// 单元格内容写入
				//  $sheet->setCellValue($dataCol . $row, $value)->getStyle($dataCol.$row)
				//->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

				if ($key == 'banjibianma') {
					$tag = 'G';
					$banji = Db::name('banjibianma')->where('banjibianma', $value)->find();
					$sheet->setCellValueExplicit($tag . $row, $banji['banjijc'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)->getStyle($tag . $row)
						->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
					// $dataCol++;
				}
				$sheet->setCellValueExplicit($dataCol . $row, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)->getStyle($dataCol . $row)
					->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
				$dataCol++;
			}


			$row++;
		}

		// Save
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save(__DIR__ . '/../../../file/数据.xlsx');
	}

	public function save1()
	{
		/*
			 $data = [
		    ['title1' => '11a1', 'title2' => 'b222'],
		    ['title1' => '11d1', 'title2' => '2c22'],
		    ['title1' => "330522918109301519", 'title2' => '22312312312312312312']
				//  ['title1' => "330522918109301519"."\t", 'title2' => 'f222'] 此方法可以防止身份证变成科学计数法
		];
		*/
		$title = ['id', '账号', '班级编码', '科目', '班主任'];

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();


		//表头
		//设置单元格内容
		$titCol = 'A';
		foreach ($title as $key => $value) {
			// 单元格内容写入
			$sheet->setCellValue($titCol . '1', $value)->getColumnDimension($titCol)->setAutoSize(true);
			$titCol++;
		}
		$row = 2; // 从第二行开始   setWidth(30)
		$data = Db::name('teachercaiji')->order('banjibianma', 'asc')->select();
		foreach ($data as $key1 => $item) {
			$dataCol = 'A';

			foreach ($item as $key => $value) {
				// 单元格内容写入
				//  $sheet->setCellValue($dataCol . $row, $value)->getStyle($dataCol.$row)
				//->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);


				$sheet->setCellValueExplicit($dataCol . $row, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)->getStyle($dataCol . $row)
					->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
				$dataCol++;
			}


			$row++;
		}

		// Save
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save(__DIR__ . '/../../../file/teacher数据.xlsx');
	}
}

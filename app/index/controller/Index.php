<?php
namespace app\index\controller;
//use app\index\controller;
//require_once __DIR__ . '/../../../vendor/autoload.php';
//use app\validate\Shenfenzheng;

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

class Index extends BaseController
{
	public function trspace($str=' '){
		$a=[];
		$a=explode(" ",$str);
		$b=[];
		$i=0;
		foreach($a as $key=>$val){
			if($val!=' '){
				$b[$i]=$val;
				$i++;
			}
		}
		return implode($b);
	}
	
    public function index()
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) 2020新春快乐</h1><p> ThinkPHP V' . \think\facade\App::version() . '<br/><span style="font-size:30px;">14载初心不改 - 你值得信赖的PHP框架</span></p><span style="font-size:25px;">[ V6.0 版本由 <a href="https://www.yisu.com/" target="yisu">亿速云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ee9b1aa918103c4fc"></think>';
		//Route::post('index/index','index/index')->token();
		/*
		header("Content-type:text/html;charset=utf-8");
		$str=$_POST['sfz'];
		$rs=$this->isCreditNo($str);
		if($rs==true)
			{
			$msg="身份证号码正确";
		}else{
			$msg="身份证号码错误！请改正！";
		}
	 

		$json_arr = array("msg"=>$msg);
		$json_obj = json_encode($json_arr);
		echo $json_obj;*/
		//echo time().rand(1000,9999);
		/*
		$a="钱迎盈	qianyy26
江银银	jyy012927
卢燕	ly066321
mgr_cxxgczx33010	mgr_cxxgczx33010
周利明	zhoulm1
盛爱华	sah120228
高荣浒	gaorh
朱婷	zhut11";
		$b=explode("\n",$a);
		$c=\str_replace("\\t\\t","('",$b);
		$d=\str_replace("\\t","','",$c);
		$e=\str_replace("\\r\\n","'),",$d);
		//dump($b);
		$c[0]=" ";
		$i=0;
		foreach($b as $key => $val){
			$c[$i]="('".\str_replace("\t","','",$val)."'),";
			$i++;
			}
		foreach($c as $val){
			echo $val."<br />";
		}
		*/
		return View::fetch();
    }
	
	public function cl()
	{
		$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
		
	 
		if(empty($q)) {
			echo '请选择一个年级';
			/*$val="<select name=\"bj\" onchange=\" \">
				<option value=\"\">选择班级</option>
				<option value=\"1\">(1)班</option>
				<option value=\"2\">(2)班</option>
				<option value=\"3\">(3)班</option>
				<option value=\"4\">(4)班</option>
				<option value=\"5\">(5)班</option>
				<option value=\"6\">(6)班</option>
				<option value=\"7\">(7)班</option>
				<option value=\"8\">(8)班</option>
				<option value=\"9\">(9)班</option>
				<option value=\"10\">(10)班</option>
				<option value=\"11\">(11)班</option>
				<option value=\"12\">(12)班</option>
				<option value=\"13\">(13)班</option>
				<option value=\"14\">(14)班</option>
				";  */
			//return $val;
			exit;
		}
		if($q==8)
		{
			$val="<select name=\"bj\" onchange=\"  \">
				<option value=\"\">选择班级</option>
				<option value=\"01\">(1)班</option>
				<option value=\"02\">(2)班</option>
				<option value=\"03\">(3)班</option>
				<option value=\"04\">(4)班</option>
				<option value=\"05\">(5)班</option>
				<option value=\"06\">(6)班</option>
				<option value=\"07\">(7)班</option>
				<option value=\"08\">(8)班</option>
				<option value=\"09\">(9)班</option>
				<option value=\"10\">(10)班</option>
				<option value=\"11\">(11)班</option>
				
				<option value=\"12\">(12)班</option></select>
				";
		}else{
			$val="<select name=\"bj\" onchange=\"  \">
				<option value=\"\">选择班级</option>
				<option value=\"01\">(1)班</option>
				<option value=\"02\">(2)班</option>
				<option value=\"03\">(3)班</option>
				<option value=\"04\">(4)班</option>
				<option value=\"05\">(5)班</option>
				<option value=\"06\">(6)班</option>
				<option value=\"07\">(7)班</option>
				<option value=\"08\">(8)班</option>
				<option value=\"09\">(9)班</option>
				<option value=\"10\">(10)班</option>
				<option value=\"11\">(11)班</option>
				<option value=\"12\">(12)班</option>
				<option value=\"13\">(13)班</option>
				
				<option value=\"14\">(14)班</option></select>";
		}
		 
		return ($val);
	}
	
	
	public function stuzhanghao()
	{
		$name1 = isset($_GET["name"]) ? $_GET["name"] : '';
		$name=$this->trspace($name1);
		$val='';
		if ($name == '')
		{
			$val="<input type=\"radio\" name=\"zhanghao\" value=\"\" checked />无账号";
		}else{
			$rs=Db::name('stuinfo')->where('xingming',$name)->where('beizhu',null)->select();
			if(count($rs)==0)
			{
				$val="<input type=\"radio\" name=\"zhanghao\" value=\"0\" checked />无账号";
			}else{
				$i=0;
				foreach($rs as $key=>$value)
				{
					if($i==2)
					{
						$val=$val."<br />";
						$i=0;
					}
					$val=$val."<input type=\"radio\" value=\"".$value['zhanghao']."\" name=\"zhanghao\"   />".$value['zhanghao']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					$i++;
					
				}
			}			
		}
		
		return $val;
	}
	public function shujucl()
	{
		$nj=Request::param('nj');
		$bj=Request::param('bj');
		$xm1=Request::param('xm');
		$sfz=Request::param('sfz');
		$sex=Request::param('sex');
		$zhanghao= Request::param('zhanghao');
		
		$xm= $this->trspace($xm1);
		$sfz= str_replace(' ','',$sfz);
		
		 $xm_len = preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$xm);		
			$msg="";
			$i=0;
			
			
		if($nj=="")
		{
			$msg=$msg."年级没有选择！<br />";
			$i++;
			
		}
		if($bj=="")
		{
			$msg=$msg."班级没有选择！<br />";
			$i++;			
		}
		
		if($sex=="")
		{
			$msg=$msg."性别没有选择！<br />";
			$i++;			
		}
		if( !$xm_len )
		{
			$msg=$msg."请填写真实姓名!<br />";
			//$i++;
		}		
		if(!($this->isCreditNo($sfz))){
			$msg=$msg."身份证号码不正确<br />";
			$i++;		}
		
		
		
		//$rs_kk=Db::name('stuinfo')->where('xingming',$xm)->where('beizhu',null)->select();
		if($zhanghao=="0" || $zhanghao=="")
		{
			//$msg=$msg."网络原因，提交的数据不完整";
			//$i++;
			
				
				$rskk1=Db::name('stuinfo')->where('xingming',$xm)->find();
				if($rskk1){
					$zhanghao=$rskk1['zhanghao'];
				}else{
					$zhanghao="";
				}
				
				//$i++;
			
		}
		/*
		if($zhanghao=="")
		{
			$msg=$msg."账号没有选择<br />";
			$i++;
		}
		*/
	   /*
	   $rskk1=Db::name('stuinfo')->where('xingming',$xm)->find();
	   if($rskk1){
	   	$zhanghao=$rskk1['zhanghao'];
	   }else{
	   	$zhanghao="";
	   }
	   */
		$rs111=Db::name('stucaiji')->where('sfz',$sfz)->find();
		if($rs111)
		{
			$msg=$msg."已经记录，请不要重复上传！";
			$i++;
		}
		if($i==0)
		{
			$newbj=$nj.$bj;			
			$bjbm=Db::name('banjibianma')->where('banjijc',$newbj)->find();
			$rs=Db::name('stucaiji')->where('sfz',$sfz)->find();
			
			
			 
			if(!$rs)
			{
				//新增记录
				
				
				$data=[				 
				'xingming'=>$xm,
				'banjibianma'=>$bjbm['banjibianma'],
				
				'sfz'=>$sfz,
				'zhanghao'=>$zhanghao,
				'sex'=>$sex,
				];
				
				$xz='';
				$fp=fopen("lock.txt","w+");
				if(flock($fp,LOCK_EX))
				{
					$xz=Db::name('stucaiji')->save($data);					
					flock($fp,LOCK_UN);					
				}
				fclose($fp);
				if($xz)
				{
					if($zhanghao!='')
					{
						$rs_zh=Db::name('stuinfo')->where('zhanghao',$zhanghao)->update(['beizhu'=>'已经更新']);
						 
					}
					echo exit('<script>top.location.href="/zjhsjtj/public/index/index/successrs?xm='.$xm.' && sfz='.$sfz.'" </script>');
				}else{
					$msg=$msg."由于网络原因，记录失败";
				}
			}
			//echo exit('<script>top.location.href="http://www.baidu.com"</script>');
		}
		$msg="<font color='red'>".$msg."</font>";
		return $msg;
		
	}

	
	
	public function yanzheng()
	{
		$id=$_GET['id'];
		View::assign('id',$id);
		return View::fetch();
	}
	public function apc()
	{
		//print_r(apc_fetch("upload_upid"));
		print_r(apc_cache_info());
	}
	
	
	public function yzpd()
	{
		$id=$_GET['id'];
		$rs=Db::name('byjt')->find($id);
		$xm=Request::param('xm');
		
		$father=Request::param('father');
		$msg='';
		$mother=Request::param('mother');
		if(($xm==$rs['xm'])&& ($father==$rs['father'])&&($mother==$rs['mother']))
		{
			echo exit('<script>top.location.href="/xstj/public/index/index/xiugai?id='.$id.'&& sfz='.$sfz.'" </script>');
		}else{
			$msg=$msg.'验证信息不正确';
		}
		return $msg;
	}
	
	public function xiugai()
	{
		$id=$_GET['id'];
		$rs=Db::name('byjt')->find($id);
		View::assign('vo',$rs);
		return View::fetch();
		
		
	}
	
	
	public function shangchuan()
	{
		$file = request()->file('image');
		    // 上传到本地服务器
		    $savename = \think\facade\Filesystem::disk('public')->putFile( 'xujie', $file);
	}
	public function successrs()
	{
		$xm=$_GET['xm'];
		$sfz=$_GET['sfz'];
		$rs=Db::name('stucaiji')->where('sfz',$sfz)->find();
		
		 
		
		
		
		View::assign('xm',$rs['xingming']);
		 
		 
		return View::fetch();
	}

	public function read()
	{
		$user=UserModel::select();
		

		$file = fopen('a.csv','w+');

        //在写入的第一个字符串开头加 bom。
        $bom =  chr(0xEF).chr(0xBB).chr(0xBF);

		 //$file = fopen("/a.csv", "w");
		// fwrite($file,chr(0xEF).chr(0xBB).chr(0xBF));
		$a=[ $bom.'weixin',
			 $bom.'mima',
			 $bom.'xm',];
		fputcsv($file,$a);
        foreach ($user as $userline) {
            $row = [
                '微信' =>$bom.$userline->wxnicheng,
                '密码' => $bom.$userline->password,
                '姓名' =>$bom. $userline->xingming,
            ];
			dump($row);
           // if ($counter == 0)
           //     fputcsv($file, array_keys($row));
            fputcsv($file, $row);
           // $counter++;
        }


	}

	public function readexcel()
	{
		
		//include  "../extend/PHPexcel/PHPExcel/IOFactory.php";
		$filename="aa.xlsx";
		//dump(dirname(__FILE__));
		$inputFileName = dirname(__FILE__) . '/../../../public/aa.xlsx';
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		// 方法二
		$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
	   
		dump($sheetData);
		//return $sheetData;
		}

	public function export()
	{
		$data = [
        ['title1' => '111', 'title2' => '222'],
        ['title1' => '333', 'title2' => '442'],
        ['title1' => '551', 'title2' => '662']
    ];
    $title = ['第一行标题', '第二行标题'];
 
    // Create new Spreadsheet object
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet(1);
 
    // 方法一，使用 setCellValueByColumnAndRow
    //表头
    //设置单元格内容
    foreach ($title as $key => $value) {
        // 单元格内容写入
        $sheet->setCellValueByColumnAndRow($key + 1, 1, $value);
    }
    $row = 2; // 从第二行开始
    foreach ($data as $item) {
        $column = 1;
        foreach ($item as $value) {
            // 单元格内容写入
            $sheet->setCellValueByColumnAndRow($column, $row, $value);
            $column++;
        }
        $row++;
    }

	 // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="01simple.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
 
    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0
 
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
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
    $title = ['id','年级', '班级','姓名','身份证号','绿码是否领取','未领取绿码原因'];
 
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
	$data=Db::name('student')->order('nj','asc')->order('bj','asc')->select();
    foreach ($data as $key1=>$item) {
        $dataCol = 'A';
				
        foreach ($item as $key=>$value) {
            // 单元格内容写入
          //  $sheet->setCellValue($dataCol . $row, $value)->getStyle($dataCol.$row)
    //->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
	
	if($key=='lvma'){
		if($item[$key]==1){
			$value='';
		}else{
			$value='未领取';
					
		}
	}
	
      $sheet->setCellValueExplicit($dataCol.$row, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)->getStyle($dataCol.$row)
    ->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
	       $dataCol++;
        }
        $row++;
    }
 
    // Save
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save(__DIR__.'/../../../file/数据.xlsx');
	}
	public function panduansfz()
	{
		//$str = input('sfz');
		 $str=$_POST['sfz'];
		//header("Content-type:text/html;charset=utf-8");
		//$str=$sfz;
		$rs=$this->validateIDCard($str);
		if($rs==true)
			{
			$msg="身份证号码正确";
			$tag=1;
			echo exit('<script>top.location.href="/tp/public/index/index/read"</script>');
			//return redirect('/tp/public/index/index/read');
		}else{
			$msg="身份证号码错误！请改正！";
			//$msg="<img src=\"/tp/public/static/pic/2.jpg\" height=\"150\" width=\"150\" />";
			$tag=0;
		}
		 //$data=[$msg,$str];
		 $data="<font color='red' ><h4>".$msg."</h4></font>";
		 $x="<font color='red'>".$msg."</font>";
		// return $x;
		return $data;
		//return json($data);
		//return $msg;  
	}
	 
	 //////////////////身份证验证///////////////////////
	 
	 
	 //验证身份证是否有效
	 function validateIDCard($IDCard) {
	     if (strlen($IDCard) == 18) {
	         return $this->check18IDCard($IDCard);
	     } elseif ((strlen($IDCard) == 15)) {
	         $IDCard = convertIDCard15to18($IDCard);
	         return $this->check18IDCard($IDCard);
	     } else {
	         return false;
	     }
	 }
	 
	 //计算身份证的最后一位验证码,根据国家标准GB 11643-1999
	 function calcIDCardCode($IDCardBody) {
	     if (strlen($IDCardBody) != 17) {
	         return false;
	     }
	 
	     //加权因子 
	     $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
	     //校验码对应值 
	     $code = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
	     $checksum = 0;
	 
	     for ($i = 0; $i < strlen($IDCardBody); $i++) {
	         $checksum += substr($IDCardBody, $i, 1) * $factor[$i];
	     }
	 
	     return $code[$checksum % 11];
	 }
	 
	 // 将15位身份证升级到18位 
	 function convertIDCard15to18($IDCard) {
	     if (strlen($IDCard) != 15) {
	         return false;
	     } else {
	         // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码 
	         if (array_search(substr($IDCard, 12, 3), array('996', '997', '998', '999')) !== false) {
	             $IDCard = substr($IDCard, 0, 6) . '18' . substr($IDCard, 6, 9);
	         } else {
	             $IDCard = substr($IDCard, 0, 6) . '19' . substr($IDCard, 6, 9);
	         }
	     }
	     $IDCard = $IDCard . calcIDCardCode($IDCard);
	     return $IDCard;
	 }
	 
	 // 18位身份证校验码有效性检查 
	 function check18IDCard($IDCard) {
	     if (strlen($IDCard) != 18) {
	         return false;
	     }
	 
	     $IDCardBody = substr($IDCard, 0, 17); //身份证主体
	     $IDCardCode = strtoupper(substr($IDCard, 17, 1)); //身份证最后一位的验证码
	 
	     if ($this->calcIDCardCode($IDCardBody) != $IDCardCode) {
	         return false;
	     } else {
	         return true;
	     }
	 }
	 
	 
	 
	//////////////////////////////////////身份证验证 
public function test($sfz,$id){  
        if($sfz == '123'){  
            return json("ajax成功！".$mess."---".$id);  
        }else{  
            return json("你输出的是其他值：".$mess."---".$id);  
        }  
    }  
	/**
 * 判断是否为合法的身份证号码
 * @param $mobile
 * @return int
 */
 public function sfz($str)
{
	 $result=$this->isCreditNO($str);
	 if($result==false)
	{
	   dump("身份证号码错误");
	 }		
	 else{
		 dump("身份证号码正确！！！");
	 }
 }
public function isCreditNo($vStr){
 $vCity = array(
  '11','12','13','14','15','21','22',
  '23','31','32','33','34','35','36',
  '37','41','42','43','44','45','46',
  '50','51','52','53','54','61','62',
  '63','64','65','71','81','82','91'
 );
 if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $vStr)) return false;
 if (!in_array(substr($vStr, 0, 2), $vCity)) return false;
 $vStr = preg_replace('/[xX]$/i', 'a', $vStr);
 $vLength = strlen($vStr);
 if ($vLength == 18) {
  $vBirthday = substr($vStr, 6, 4) . '-' . substr($vStr, 10, 2) . '-' . substr($vStr, 12, 2);
 } else {
  $vBirthday = '19' . substr($vStr, 6, 2) . '-' . substr($vStr, 8, 2) . '-' . substr($vStr, 10, 2);
 }
 if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday) return false;
 if ($vLength == 18) {
  $vSum = 0;
  for ($i = 17 ; $i >= 0 ; $i--) {
   $vSubStr = substr($vStr, 17 - $i, 1);
   $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr , 11));
  }
  if($vSum % 11 != 1) return false;
 }
 return true;
}

    public function hello()
    {
        $id=$_POST['sfz'];
		return json($id);
    }
}

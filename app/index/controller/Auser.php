<?php
namespace app\index\controller;

use app\BaseController;
use app\index\model\User as UserModel;
use think\facade\Db;
use think\facade\View;

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

class Auser extends BaseController
{
	public function index()
	{
		
 

		return View::fetch();
	}
	
	public function cl()
	{
		$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
 
		if(empty($q)) {
			echo '请选择一个网站';
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
		if($q==1)
		{
			$val="<select name=\"bj\" onchange=\" \">
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
				";
		}else{
			$val="<select name=\"bj\" onchange=\" \">
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
				<option value=\"13\">(15)班</option>
				<option value=\"14\">(16)班</option>
				";
		}
		return ($val);
	}
	
	
	public function mphc()
	{
		$ffmpeg = FFMpeg\FFMpeg::create();
		$video= $ffmpeg->open('./1.mp3');
		$video->filters()->resize(new FFMpeg\Coordinate\Dimension(320, 240))->synchronize();
		$video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))->save('keep.jpg');
		$video->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')->save(newFFMpeg\Format\Video\WebM(), 'export-webm.webm');
	}
}
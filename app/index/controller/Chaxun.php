<?php
namespace app\index\controller;
//use app\index\controller;
//require_once __DIR__ . '/../../../vendor/autoload.php';
//use app\validate\Shenfenzheng;

use app\BaseController;
use app\index\model\User as UserModel;
use app\index\model\Byjt as ByjtModel;
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

class Chaxun extends BaseController
{
	public function index()
	{
		$list=Db::name('byjt')->order('nj','asc')->order('bj','asc')->paginate(10);
		View::assign('list',$list);
		return View::fetch();
	}
}
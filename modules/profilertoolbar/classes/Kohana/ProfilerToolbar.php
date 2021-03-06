<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author  Aleksey Ivanov <alertdevelop@gmail.com>
 * @see     http://alertdevelop.ru/projects/profilertoolbar
 * @see     https://github.com/Alert/profilertoolbar
 */
class Kohana_ProfilerToolbar{

	/**
	 * @var string
	 */
	public static $version = '0.2.8';
	/**
	 * @var string
	 */
	public static $kohana_version = '3.3'; // adapting for 3.3 by Invision (Invision70@gmail.com)
	/**
	 * @var array
	 */
	private static $_cfg = null;
	/* @var FirePHP */
	private static $_fb = null;
	/**
	 * @var array
	 */
	private static $_CACHE = [];
	/**
	 * @var array
	 */
	private static $_SQL = [];
	/**
	 * @var array
	 */
	private static $_CUSTOM = [];

	/**
	 * using in HMVC for collect data from last request
	 * @var string (request name)
	 */
	private static $_data_collect_current_route = '';

	// loaded xdebug extension or not
	/**
	 * @var null
	 */
	private static $_xdebug = null;

	// data for output
	/**
	 * @var null
	 */
	public static $DATA_APP_TIME = null;
	/**
	 * @var null
	 */
	public static $DATA_APP_MEMORY = null;
	/**
	 * @var null
	 */
	public static $DATA_SQL = null;
	/**
	 * @var null
	 */
	public static $DATA_CACHE = null;
	/**
	 * @var null
	 */
	public static $DATA_POST = null;
	/**
	 * @var null
	 */
	public static $DATA_GET = null;
	/**
	 * @var null
	 */
	public static $DATA_FILES = null;
	/**
	 * @var null
	 */
	public static $DATA_COOKIE = null;
	/**
	 * @var null
	 */
	public static $DATA_SESSION = null;
	/**
	 * @var null
	 */
	public static $DATA_SERVER = null;
	/**
	 * @var null
	 */
	public static $DATA_ROUTES = null;
	/**
	 * @var null
	 */
	public static $DATA_INC_FILES = null;
	/**
	 * @var null
	 */
	public static $DATA_CUSTOM = null;

	/**
	 * Collect all data
	 * @static
	 * @return void
	 */
	private static function collectData(){

		/** @noinspection PhpUndefinedClassInspection */
		/*if(Route::name(Request::current()->route()) == self::$_data_collect_current_route)
		{
			return;
		}*/
		self::$DATA_APP_TIME = self::getAppTime();
		self::$DATA_APP_MEMORY = self::getAppMemory();
		self::$DATA_SQL = self::getSql();
		self::$DATA_CACHE = self::getCache();
		self::$DATA_POST = self::getPost();
		self::$DATA_GET = self::getGet();
		self::$DATA_FILES = self::getFiles();
		self::$DATA_COOKIE = self::getCookie();
		self::$DATA_SESSION = self::getSession();
		self::$DATA_SERVER = self::getServer();
		self::$DATA_ROUTES = self::getRoutes();
		self::$DATA_INC_FILES = self::getIncFiles();
		self::$DATA_CUSTOM = self::getCustom();
		/** @noinspection PhpUndefinedClassInspection */
		//self::$_data_collect_current_route = Route::name(Request::current()->route());
	}

	/**
	 * Render data to html
	 * @static
	 * @param bool $print - echo rendered data
	 * @return string
	 */
	public static function render($print = false){
		if(!self::cfg('html.enabled')){
			return '';
		}
		self::collectData();
		$html = View::factory('PTB/all')->render();
		if($print){
			echo $html;
		}
		return $html;
	}

	/**
	 * @return string
	 */
	public static function getHtml()
	{
		if(!self::cfg('html.enabled')){
			return '';
		}
		self::collectData();
		return View::factory('PTB/tpl')->render();
	}

	/**
	 * Send data to FireBug
	 * @static
	 * @return void
	 */
	public static function firebug(){
		if(!self::cfg('firebug.enabled')){
			return;
		}

		self::collectData();
		self::$_fb = FirePHP::getInstance(true);
		// set FireBug settings
		//$options = self::$_fb->getOptions();
		self::$_fb->setOption('maxObjectDepth', self::cfg('firebug.maxObjectDepth', 8));
		self::$_fb->setOption('maxArrayDepth', self::cfg('firebug.maxArrayDepth', 8));
		self::$_fb->setOption('maxDepth', self::cfg('firebug.maxDepth', 10));

		// append info about module
		self::$_fb->info('========== ProfilerToolbar v' . self::$version . ' for Kohana v' . self::$kohana_version . ' ==========');
		// append other data
		if(self::cfg('firebug.showTotalInfo')){
			self::appendTotalInfo();
		}
		if(self::cfg('firebug.showSql')){
			self::appendSql();
		}
		if(self::cfg('firebug.showCache')){
			self::appendCache();
		}
		if(self::cfg('firebug.showVars')){
			self::appendVars();
		}
		if(self::cfg('firebug.showRoutes')){
			self::appendRoutes();
		}
		if(self::cfg('firebug.showIncFiles')){
			self::appendIncFiles();
		}
		if(self::cfg('firebug.showCustom')){
			self::appendCustom();
		}
		// end
		self::$_fb->log('============================================================');
	}

	// =============== methods for collect data ======================================

	/**
	 * @return mixed
	 */
	private static function getAppTime(){
		$tmp = Profiler::application();
		return $tmp['current']['time'];
	}

	/**
	 * @return int
	 */
	private static function getAppMemory(){
		//    $tmp = Profiler::application();
		//    return $tmp['current']['memory'];
		return memory_get_peak_usage(true);
	}

	/**
	 * @return array|int|string
	 */
	private static function getSql(){
		// calc explain
		if(self::cfg('html.showSqlExplain') && self::cfg('html.showSqlExplain')){
			/*Перебераем все вкладки*/
			foreach(self::$_SQL as $instance => $query)
			{
				/**/
				foreach($query as $sql => $data)
				{
					if(stripos($sql, 'select') === 0){
						if(class_exists('\\Database\ActiveRecord\Record'))
						{
							$pdo = \Database\ActiveRecord\Record::$db->getPdoInstance();
							try
							{
								/*
								$stmt = $pdo->prepare('EXPLAIN '.$sql);
								//$stmt->execute();
								$expl = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
							}
							catch(PDOException $e)
							{
								self::addData($e,'PDOException');
							}
						}
						else
						{
							$expl = Database::instance($instance)->query(Database::SELECT,'EXPLAIN '.$sql)->as_array();
						}
						self::$_SQL[$instance][$sql]['explain'] = $expl;
					}
				}
			}
		}

		// collect data
		$sql = [];
		$groups = Profiler::groups();
		foreach($groups as $groupName => $benchmarks){
			if(strpos($groupName, 'database') !== 0){
				continue;
			}
			$sqlGroup = preg_replace('/(.*) \(\'(.*)\'\)/Usi','$2',$groupName);
			/*$sqlGroup = substr($groupName, strpos($groupName, '(') + 2,
				strpos($groupName, ')') - strpos($groupName, '(') - 2);
*/
			$sql[$sqlGroup] = [
				'data'  => [],
				'total' => [
					'time'   => 0,
					'memory' => 0,
					'count'  => 0
				]
			];
			foreach($benchmarks as $benchName => $tokens){
				foreach($tokens as $token){
					$stats = Profiler::stats([$token]);
					$sql_string = $benchName;
					if(isset(self::$_SQL[$sqlGroup][$benchName]['data']))
					{
						if (strpos($sql_string, ":")) {
							foreach(self::$_SQL[$sqlGroup][$benchName]['data'] as $key =>$value)
							{
								$sql_string = preg_replace('|'.$key.'|Usi',"'".$value."'",$sql_string);
							}
						}
					}
					$sql[$sqlGroup]['data'][] =
					[
						'sql'     => $sql_string,
						'time'    => $stats['total']['time'],
						'memory'  => $stats['total']['memory'],
						'rows'    => (isset(self::$_SQL[$sqlGroup][$benchName])) ? self::$_SQL[$sqlGroup][$benchName]['rows'] : null,
						'explain' => (isset(self::$_SQL[$sqlGroup][$benchName])) ? self::$_SQL[$sqlGroup][$benchName]['explain'] : null,
					];
					$sql[$sqlGroup]['total']['time'] += $stats['total']['time'];
					$sql[$sqlGroup]['total']['memory'] += $stats['total']['memory'];
					$sql[$sqlGroup]['total']['count']++;
				}
			}
		}
		return $sql;
	}

	/**
	 * @return array
	 */
	private static function getCache(){
		if(!isset(self::$_CACHE['total'])){
			self::$_CACHE['total'] = [
				'get' => 0,
				'set' => 0,
				'del' => 0
			];
		}
		if(!isset(self::$_CACHE['data'])){
			self::$_CACHE['data']['default'] = [
				'total' => [
					'get' => 0,
					'set' => 0,
					'del' => 0
				],
				'data'  => [],
			];
		}
		return self::$_CACHE;
	}

	/**
	 * @return array
	 */
	private static function getPost(){
		return (isset($_POST)) ? $_POST : [];
	}

	/**
	 * @return array
	 */
	private static function getGet(){
		return (isset($_GET)) ? $_GET : [];
	}

	/**
	 * @return array
	 */
	private static function getFiles(){
		$all = [];
		foreach($_FILES as $k => $file){
			if(is_array($file['name'])){
				$count = count($file['name']);
				for($i = 0; $i < $count; $i++){
					$all[$k . " [$i]"] = [
						'name'     => $file['name'][$i],
						'type'     => $file['type'][$i],
						'tmp_name' => $file['tmp_name'][$i],
						'error'    => $file['error'][$i],
						'size'     => $file['size'][$i]
					];
				}
			} else{
				$all[$k] = $file;
			}
		}

		return $all;
	}

	/**
	 * @return array
	 */
	private static function getCookie(){
		return (isset($_COOKIE)) ? $_COOKIE : [];
	}

	/**
	 * @return array
	 */
	private static function getSession(){
		return Session::instance()->as_array();
	}

	/**
	 * @return array
	 */
	private static function getServer(){
		return (isset($_SERVER)) ? $_SERVER :[];
	}

	/**
	 * @return array
	 */
	private static function getRoutes(){
		$res = [
			'data'  =>[],
			'total' => ['count' => 0]
		];
		/** @noinspection PhpUndefinedClassInspection */
		$res['data'] = Route::all();
		$res['total']['count'] = count($res['data']);
		return $res;
	}

	/**
	 * @return array
	 */
	private static function getIncFiles(){
		$files = get_included_files();
		$res = [
			'data'  =>[],
			'total' => [
				'size'  => 0,
				'lines' => 0,
				'count' => 0
			]
		];
		foreach($files as $file){
			#TODO Fix phar archive
			$size = @filesize($file);
			$lines = substr_count(@file_get_contents($file), "\n");
			$res['total']['size'] += $size;
			$res['total']['lines'] += $lines;
			$res['total']['count']++;
			$res['data'][] = [
				'name'         => $file,
				'size'         => $size,
				'lines'        => $lines,
				'lastModified' => @filemtime($file),
			];
		}
		return $res;
	}

	/**
	 * @return array
	 */
	private static function getCustom(){
		return self::$_CUSTOM;
	}

	// =============== /methods for collect data ======================================

	// =============== methods for append data to Firebug =============================

	/**
	 *
	 */
	private static function appendTotalInfo(){
		self::$_fb->log('[AppTime: ' . self::formatTime(self::$DATA_APP_TIME) . '] [AppMemory: ' . self::formatMemory(self::$DATA_APP_MEMORY) . ']');
	}

	/**
	 *
	 */
	private static function appendSql(){
		$sql = [
			'count'  => 0,
			'time'   => 0,
			'memory' => 0
		];
		foreach(self::$DATA_SQL as $inst)
		{
			$sql['count'] += $inst['total']['count'];
			$sql['time'] += $inst['total']['time'];
			$sql['memory'] += $inst['total']['memory'];
		}
		self::$_fb->group('SQL [count: ' . $sql['count'] . '] [time: ' . self::formatTime($sql['time']) . '] [memory: ' . self::formatMemory($sql['memory']) . ']',
			['Collapsed' => true]);
		$tbl = [
			0 => [
				'№',
				'query',
				'rows',
				'time',
				'memory'
			]
		];
		$tbl_explain = [];
		$num = 0;
		foreach(self::$DATA_SQL as $inst){
			foreach($inst['data'] as $q)
			{
				$tbl[] = [
					++$num,
					$q['sql'],
					$q['rows'],
					self::formatTime($q['time'], true, false),
					self::formatMemory($q['memory'])
				];
				if(!empty($q['explain'])){
					$tbl_explain[$num] = [
						0 => [
							'id',
							'select_type',
							'table',
							'type',
							'possible_keys',
							'key',
							'key_len',
							'ref',
							'rows',
							'Extra'
						]
					];

					foreach($q['explain'] as $val){
						$tbl_explain[$num][] = [
							$val['id'],
							$val['select_type'],
							$val['table'],
							$val['type'],
							$val['possible_keys'],
							$val['key'],
							$val['key_len'],
							$val['ref'],
							$val['rows'],
							$val['Extra']
						];
					}
				}
			}
		}
		self::$_fb->table('SQL queries', $tbl);

		if(self::cfg('firebug.showSqlExplain')){
			self::$_fb->group('Explains', ['Collapsed' => true]);
			foreach($tbl_explain as $num => $tbl){
				self::$_fb->table('EXPLAIN for query № ' . $num, $tbl);
			}
			self::$_fb->groupEnd();
		}

		self::$_fb->groupEnd();
		unset($sql);
	}

	/**
	 *
	 */
	private static function appendCache(){
		self::$_fb->group('Cache [GET: ' . self::$DATA_CACHE['total']['get'] . '] [SET: ' . self::$DATA_CACHE['total']['set'] . '] [DEL: ' . self::$DATA_CACHE['total']['del'] . ']',
			['Collapsed' => true]);
		$num = 0;
		foreach(self::$DATA_CACHE['data'] as $instance => $data){
			$tbl = [
				0 => [
					'№',
					'action',
					'id',
					'lifetime'
				]
			];
			foreach($data['data'] as $val){
				$tbl[] = [
					++$num,
					$val['action'],
					$val['id'],
					$val['lifetime']
				];
			}
			self::$_fb->table($instance, $tbl);
		}
		self::$_fb->groupEnd();
	}

	/**
	 *
	 */
	private static function appendVars(){
		$count = [
			'post'    => count(self::$DATA_POST),
			'get'     => count(self::$DATA_GET),
			'files'   => count(self::$DATA_FILES),
			'cookie'  => count(self::$DATA_COOKIE),
			'session' => count(self::$DATA_SESSION),
		];
		self::$_fb->group("Vars [POST: {$count['post']}] [GET: {$count['get']}] [FILES: {$count['files']}] [COOKIE: {$count['cookie']}] [SESSION: {$count['session']}]",
			['Collapsed' => true]);
		self::$_fb->log(self::$DATA_POST, 'POST (' . $count['post'] . ')');
		self::$_fb->log(self::$DATA_GET, 'GET (' . $count['get'] . ')');
		self::$_fb->log(self::$DATA_FILES, 'FILES (' . $count['files'] . ')');
		self::$_fb->log(self::$DATA_COOKIE, 'COOKIE (' . $count['cookie'] . ')');
		self::$_fb->log(self::$DATA_SESSION, 'SESSION (' . $count['session'] . ')');
		self::$_fb->log(self::$DATA_SERVER, 'SERVER');
		self::$_fb->groupEnd();
		unset($count);
	}

	/**
	 *
	 */
	private static function appendRoutes(){
		$tbl = [
			0 => [
				'№',
				'name',
				'controller',
				'action',
				'params'
			]
		];
		$num = $useNum = 0;
		foreach(ProfilerToolbar::$DATA_ROUTES['data'] as $name => $route){
			if(Request::$current->route() == $route){
				$params = [];
				foreach(Request::$current->param() as $k => $v){
					$params[] = $k . ': ' . $v;
				}
				$tbl[] = [
					++$num,
					'✔ ' . $name,
					Request::$current->controller(),
					Request::$current->action(),
					implode('; ', $params)
				];
				$useNum = $num;
			} else{
				$tbl[] = [
					++$num,
					$name,
					'',
					'',
					''
				];
			}
		}
		$useRouteStr = "{$tbl[$useNum][1]} | controller: {$tbl[$useNum][2]} | action: {$tbl[$useNum][3]} | params: {$tbl[$useNum][4]}";
		self::$_fb->group('Routes (' . self::$DATA_ROUTES['total']['count'] . ') ' . $useRouteStr,
			['Collapsed' => true]);
		self::$_fb->table('Routes', $tbl);
		self::$_fb->groupEnd();
	}

	/**
	 *
	 */
	private static function appendIncFiles(){
		self::$_fb->group('Files (' . self::$DATA_INC_FILES['total']['count'] . ')', ['Collapsed' => true]);
		$tbl = [
			0 => [
				'№',
				'file',
				'size',
				'lines',
				'last modified'
			]
		];
		$num = 0;
		foreach(self::$DATA_INC_FILES['data'] as $file){
			$tbl[] = [
				++$num,
				$file['name'],
				ProfilerToolbar::formatMemory($file['size']),
				number_format($file['lines']),
				date("Y.m.d H:i:s", $file['lastModified'])
			];
		}
		self::$_fb->table('Files', $tbl);
		self::$_fb->groupEnd();
	}

	/**
	 *
	 */
	private static function appendCustom(){
		$custom_count = 0;
		foreach(ProfilerToolbar::$DATA_CUSTOM as $v){
			$custom_count += count($v);
		}
		self::$_fb->group('YOUR (' . $custom_count . ')', ['Collapsed' => true]);
		foreach(self::$DATA_CUSTOM as $k => $data){
			self::$_fb->group($k, ['Collapsed' => true]);
			$num = 0;
			foreach($data as $item){
				self::$_fb->log($item, ++$num);
			}
			self::$_fb->groupEnd();
		}
		self::$_fb->groupEnd();
	}

	// =============== /methods for append data to Firebug =============================

	/**
	 * Collect sql queries
	 * Used in database classes
	 * @static
	 * @param $instance
	 * @param $sql
	 * @param null $rows
	 * @param array $sql_data
	 * @return void
	 */
	public static function setSqlData($instance, $sql, $rows = null,$sql_data = []){
		self::$_SQL[$instance][$sql] = [
			'rows'    => $rows,
			'explain' => NULL,
			'data'    => $sql_data,
		];
	}

	/**
	 * Collect Cache log item
	 * Used in Cache classes
	 * @static
	 * @param $action
	 * @param $instance
	 * @param $id
	 * @param null $lifetime
	 * @return void
	 */
	public static function cacheLog($action, $instance, $id, $lifetime = null){
		if(!in_array($action, [
			'get',
			'set',
			'del'
		])
		){
			return;
		}
		self::$_CACHE['data'][$instance]['data'][] = [
			'action'   => $action,
			'id'       => $id,
			'lifetime' => $lifetime
		];
		if(!isset(self::$_CACHE['total'])){
			self::$_CACHE['total'] = [
				'get' => 0,
				'set' => 0,
				'del' => 0
			];
		}
		if(!isset(self::$_CACHE['data'][$instance]['total'])){
			self::$_CACHE['data'][$instance]['total'] = [
				'get' => 0,
				'set' => 0,
				'del' => 0
			];
		}
		self::$_CACHE['total'][$action]++;
		self::$_CACHE['data'][$instance]['total'][$action]++;
	}

	/**
	 * Add YOUR custom data
	 * @static
	 * @param $data mixed
	 * @param string $tabName
	 * @return void
	 */
	public static function addData($data, $tabName = 'default'){
		//$tabName = URL::title($tabName);
		self::$_CUSTOM[$tabName][] = $data;
	}

	/**
	 * Get module config param
	 * @static
	 * @param string $param
	 * @param bool $default
	 * @return mixed
	 */
	public static function cfg($param = '', $default = false){
		if(self::$_cfg === null){
			self::$_cfg = Kohana::$config->load('profilertoolbar');
		}
		if(empty($param)){
			return self::$_cfg;
		}
		return Arr::path(self::$_cfg, $param, $default);
	}

	// ============================= help functions ==========================================
	/**
	 * @param $time
	 * @param bool $addUnit
	 * @param bool $spaceBeforeUnit
	 * @return string
	 */
	public static function formatTime($time, $addUnit = true, $spaceBeforeUnit = true){
		$decimals = 6;
		if(($p = self::cfg('format.time')) == 'ms'){
			$time *= 1000;
			$decimals = 3;
		}
		$res = number_format($time, $decimals);
		if($addUnit){
			$res .= ($spaceBeforeUnit) ? ' ' . $p : $p;
		}
		return $res;
	}

	/**
	 * @param $memory
	 * @param bool $addUnit
	 * @param bool $spaceBeforeUnit
	 * @return string
	 */
	public static function formatMemory($memory, $addUnit = true, $spaceBeforeUnit = true){
		if(($p = self::cfg('format.memory')) == 'kb'){
			$memory /= 1024;
		} else $memory /= 1024 * 1024;
		$res = number_format($memory);
		if($addUnit){
			$res .= ($spaceBeforeUnit) ? ' ' . $p : $p;
		}
		return $res;
	}

	/**
	 * is xdebug loaded or not
	 * @static
	 * @return bool
	 */
	private static function isXdebug(){
		if(self::$_xdebug === null){
			self::$_xdebug = extension_loaded('xdebug');
		}
		return self::$_xdebug;
	}

	/**
	 * Override system var_dump
	 * @static
	 * @param $var
	 * @return string
	 */
	public static function varDump($var){
		if(self::isXdebug()){
			ob_start();
			var_dump($var);
			return ob_get_clean();
		}

		if(is_bool($var)){
			return ($var) ? 'true' : 'false';
		} elseif(is_scalar($var)){
			return HTML::chars($var);
		} else{
			ob_start();
			var_dump($var);
			$data = ob_get_clean();
			$data = preg_replace('/=>\n\s+/', ' => ', $data);
			$data = HTML::chars($data);
			return '<pre>' . $data . '</pre>';
		}
	}

	/**
	 * Highlite code
	 * @static
	 * @param $source
	 * @param $lang (sql|php)
	 * @return string
	 */
	public static function highlight($source, $lang){
		if(!in_array($lang, [
			'sql',
			'php'
		])
		){
			return $source;
		}
		$geshi = new GeSHi($source, $lang);
		$geshi->enable_classes();
		$geshi->enable_keyword_links(false);
		$res = $geshi->parse_code();
		$res = str_replace('<pre class="' . $lang . '">', '', $res);
		$res = str_replace('</pre>', '', $res);
		$res = trim(rtrim($res), "\n");
		return $res;
	}

	/**
	 * get part of file source by line
	 * and can highlite it
	 * @static
	 * @param $file
	 * @param $line_number
	 * @param int $padding
	 * @param bool $highlite
	 * @param string $lang
	 * @return string
	 */
	public static function debugSource($file, $line_number, $padding = 5, $highlite = false, $lang = ''){
		if(!$file OR !is_readable($file)){
			return '';
		}

		$file = fopen($file, 'r');
		$line = 0;
		$range = [
			'start' => $line_number - $padding,
			'end'   => $line_number + $padding
		];
		$format = '% ' . strlen($range['end']) . 'd';

		$source = '';
		while(($row = fgets($file)) !== false){
			if(++$line > $range['end']){
				break;
			}
			if($line >= $range['start']){
				$source .= $row;
			}
		}
		fclose($file);

		if($highlite){
			$source = self::highlight($source, $lang);
		}

		$source = explode("\n", $source);

		$line = $range['start'];
		$result = '';
		foreach($source as $row){
			$hRow = ($line == $line_number) ? ' highlight' : '';
			if($line === $line_number){
				self::addData($row, 'sec');
			}
			$result .= '<span class="line' . $hRow . '"><span class="num">' . sprintf($format,
					$line) . ' </span>' . $row . '</span>';
			$line++;
		}

		return $result;
	}

	/**
	 * get source by line in all files of trace
	 * @static
	 * @param array|null $trace
	 * @param bool $highlight
	 * @param string $lang
	 * @return array
	 */
	public static function debugTrace(array $trace = null, $highlight = false, $lang = ''){
		if($trace === null){
			$trace = debug_backtrace();
		}
		// Non-standard function calls
		$statements = [
			'include',
			'include_once',
			'require',
			'require_once'
		];

		$output = [];
		foreach($trace as $step){
			if(!isset($step['function'])){
				continue;
			}
			if(isset($step['file']) AND isset($step['line'])){
				// Include the source of this step
				$source = self::debugSource($step['file'], $step['line'], 5, $highlight, $lang);
			}

			if(isset($step['file'])){
				$file = $step['file'];

				if(isset($step['line'])){
					$line = $step['line'];
				}
			}

			// function()
			$function = $step['function'];

			if(in_array($step['function'], $statements)){
				if(empty($step['args'])){
					$args = [];
				} else $args = [$step['args'][0]];
			} elseif(isset($step['args'])){
				if(!function_exists($step['function']) OR strpos($step['function'], '{closure}') !== false){
					// Introspection on closures or language constructs in a stack trace is impossible
					$params = null;
				} else{
					if(isset($step['class'])){
						if(method_exists($step['class'], $step['function'])){
							$reflection = new ReflectionMethod($step['class'], $step['function']);
						} else{
							$reflection = new ReflectionMethod($step['class'], '__call');
						}
					} else{
						$reflection = new ReflectionFunction($step['function']);
					}

					// Get the function parameters
					$params = $reflection->getParameters();
				}

				$args = [];

				foreach($step['args'] as $i => $arg){
					if(isset($params[$i])){
						// Assign the argument by the parameter name
						$args[$params[$i]->name] = $arg;
					} else{
						// Assign the argument by number
						$args[$i] = $arg;
					}
				}
			}

			if(isset($step['class'])){
				// Class->method() or Class::method()
				$function = $step['class'] . $step['type'] . $step['function'];
			}

			$output[] = [
				'function' => $function,
				'args'     => isset($args) ? $args : null,
				'file'     => isset($file) ? $file : null,
				'line'     => isset($line) ? $line : null,
				'source'   => isset($source) ? $source : null,
			];

			unset($function, $args, $file, $line, $source);
		}

		return $output;
	}

}
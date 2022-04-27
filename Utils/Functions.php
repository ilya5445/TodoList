<?php

namespace Utils;

class Functions {

	public static function sort_link($title, $a, $b) {

		$sort = @$_GET['sort'];

		if ($sort == $a) {
			return '<a class="btn btn-secondary active" href="?' . self::addUrlParams(["sort" => $b]) . '">' . $title . ' <i>▲</i></a>';
		} elseif ($sort == $b) {
			return '<a class="btn btn-secondary active" href="?' . self::addUrlParams(["sort" => $a]) . '">' . $title . ' <i>▼</i></a>';
		} else {
			return '<a class="btn btn-secondary" href="?' . self::addUrlParams(["sort" => $a]) . '">' . $title . '</a>';
		}

	}

	public static function addUrlParams($params = []) {
		return http_build_query(array_merge($_GET, $params));
	}

	public static function pagination($totalItems, $perPage) {

		$pages = ceil($totalItems / $perPage);

		if(!isset($_GET['page']) || intval($_GET['page']) == 0) {
			$page = 1;
		} else if (intval($_GET['page']) > $totalItems) {
			$page = $pages;
		} else {
			$page = intval($_GET['page']);
		}

		$pager = '<nav aria-label="Page navigation example">';
		$pager .= '<ul class="pagination">';
		$pager .= '<li class="page-item"><a class="page-link" href="?'.self::addUrlParams(['page' => 1]).'">В начало</a></li>';

		for($i = 1; $i <= $pages; $i++) {
			$pager .= '<li class="page-item"><a class="page-link" href="?'.self::addUrlParams(['page' => $i]).'">'.$i.'</a></li>';
        }

		$pager .= '<li class="page-item"><a class="page-link" href="?'.self::addUrlParams(['page' => $pages]).'">Конец</a></li>';
		$pager .= '</ul>';
		$pager .= '</nav>';
 
        return $pager;

	}
	
}
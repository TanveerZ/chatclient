<?php
class User {

	public function __construct() {
		global $con;
		$db = new DB_Class();
		$this->con = $db->db_connection();


	}

	public function get_num_rows($table, $fields, $where = '') {

		$query = "SELECT " . $fields . " FROM " . $table;

		if ($where != '') {

			$query = $query . " WHERE " . $where;

		}

		$sql = mysqli_query($this->con, $query);

		$num_rows = mysqli_num_rows($sql);

		if ($num_rows) {

			return $num_rows;

		} else {

			return 0;

		}

	}

	public function select_record_orderlimitonly($table, $fields, $where = '', $orderby = '', $limit = '') {

		$query = "SELECT " . $fields . " FROM " . $table;

		if ($where != '') {

			$query = $query . " WHERE " . $where;

		}

		if ($orderby != '') {

			$query = $query . " ORDER BY " . $orderby;

		}

		if ($limit != '') {

			$query = $query . " LIMIT " . $limit;

		}

		$sql = mysqli_query($this->con, $query);

		$num_rows = mysqli_num_rows($sql);

		if ($num_rows > 0) {

			while ($row = mysqli_fetch_assoc($sql)) {

				$data[] = $row;

			}

			return $data;

		}

	}

	public function select_record_orderlimit($table, $fields, $where = '', $orderby = '', $limit = '') {

		$query = "SELECT " . $fields . " FROM " . $table;

		if ($where != '') {

			$query = $query . " WHERE " . $where;

		}

		if ($orderby != '') {

			$query = $query . " ORDER BY " . $orderby;

		}

		if ($limit != '') {

			$query = $query . " LIMIT " . $limit . "," . PERPAGE;

		}

		$sql = mysqli_query($this->con, $query);

		$num_rows = mysqli_num_rows($sql);

		if ($num_rows > 0) {

			while ($row = mysqli_fetch_assoc($sql)) {

				$data[] = $row;

			}

			return $data;

		}

	}

	public function select_row($table, $fields, $where = '') {

		$query = "SELECT " . $fields . " FROM " . $table;

		if ($where != '') {

			$query = $query . " WHERE " . $where;

		}

//echo "<pre>"; print_r($this->con); die();
		$sql = mysqli_query($this->con, $query);

		$num_rows = mysqli_num_rows($sql);

		if ($num_rows > 0) {

			while ($row = mysqli_fetch_assoc($sql)) {

				$data = $row;

			}
//print_r($data); die();
			return $data;

		}
		else
			return false;

	}

	public function insert_records($table, $data, $print = '0') {

		// build query...

		$sql = "INSERT INTO " . $table . "";

		// implode keys of $array...

		$sql .= " (`" . implode("`, `", array_keys($data)) . "`)";

		// implode values of $array...

		$sql .= " VALUES ('" . implode("', '", $data) . "') ";

		// execute query...

		if ($print == '1') {

			echo $sql;

		}
		//echo $sql;die;
		$result = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));

		return mysqli_insert_id($this->con);

	}

	public function check_login($emailusername, $password) {

		$password = md5($password);

		//echo "SELECT id ,first_name from users WHERE email = '$emailusername'  and password = '$password'";

		$result = @mysqli_query($this->con, "SELECT id ,first_name from users WHERE email = '$emailusername'  and password = '$password'");

		$user_data = @mysqli_fetch_array($result);

		$no_rows = @mysqli_num_rows($result);

		if ($no_rows == 1) {

			$_SESSION['login'] = true;

			$_SESSION['first_name'] = $user_data['fname'];

			$_SESSION['uid'] = $user_data['id'];

			return TRUE;

		} else {

			return FALSE;

		}

	}

	public function check_login_admin($emailusername, $password) {

		$password = md5($password);

		//echo "SELECT id ,first_name from users WHERE email = '$emailusername'  and password = '$password'";

		$result = @mysqli_query($this->con, "SELECT id ,fname,lname, email, password, user_type from users WHERE email = '$emailusername'  and password = '$password' AND user_type='1'");

		$user_data = @mysqli_fetch_array($result);

		$no_rows = @mysqli_num_rows($result);

		if ($no_rows == 1) {

			$_SESSION['login'] = true;

			$_SESSION['first_name'] = $user_data['fname'];

			$_SESSION['uid'] = $user_data['id'];

			return TRUE;

		} else {

			return FALSE;

		}

	}

	function Update_Dynamic_Query($TableName, $ValueArray, $FieldArray, $Field, $Id) {

		$CountField = count($FieldArray);

		$CountValue = count($ValueArray);

		if ($CountField == $CountValue) {

			$sql = "update `$TableName` set ";

			for ($fi = 0; $fi < $CountField; $fi++) {

				if ($fi == $CountField - 1) {

					$sql .= "`" . $FieldArray[$fi] . "` = ";

					$sql .= "'" . $ValueArray[$fi] . "'";

				} else {

					$sql .= "`" . $FieldArray[$fi] . "` = ";

					$sql .= "'" . $ValueArray[$fi] . "',";

				}

			}

			$sql .= " where `$Field` = '$Id'";
//echo $sql; return $sql; die();
			$result = @mysqli_query($this->con, $sql);

			return $result;

		} else {

			return false;

		}

	}

	public function select_allrecords($table, $fields) {

		$sql = mysqli_query($this->con, "select " . $fields . " from " . $table);
	//echo print_r("select " . $fields . " from " . $table); die();
		$num_rows = mysqli_num_rows($sql);

		if ($num_rows > 0) {

			while ($row = mysqli_fetch_assoc($sql)) {

				$data[] = $row;

			}

			return $data;

		}

	}

	public function select_records($table, $fields, $where) {

		$sql = mysqli_query($this->con, "select " . $fields . " from " . $table . " where " . $where);
//echo print_r("select " . $fields . " from " . $table . " where " . $where); die();
//echo "<pre>"; print_r($sql->num_rows); //die();
//echo "</pre>";
		if($sql == FALSE){
			return null;
		}
		$num_rows = mysqli_num_rows($sql);
//echo print_r($num_rows); die();
		if ($num_rows > 0) {

			while ($row = mysqli_fetch_array($sql)) {

				$data[] = $row;

			}

			return $data;

		}

	}

	public function delete_row($table, $where = '') {

		$query = @mysqli_query($this->con, "DELETE FROM " . $table . " WHERE " . $where);

	}

	###################### pagination ###########################

	function getPagingQuery($sql, $itemPerPage = 5) {

		if (isset($_GET['page']) && (int) $_GET['page'] > 0) {

			$page = (int) $_GET['page'];

		} else {

			$page = 1;

		}

		// start fetching from this row number

		$offset = ($page - 1) * $itemPerPage;

		return $sql . " LIMIT $offset, $itemPerPage";

	}

	function getPagingLink($sql, $itemPerPage = 5, $strGet = '', $self = FALSE) {

		$result = mysqli_query($this->con, $sql);

		$pagingLink = '';

		$totalResults = mysqli_num_rows($result);

		$totalPages = ceil($totalResults / $itemPerPage);

		// how many link pages to show

		$numLinks = 10;

		// create the paging links only if we have more than one page of results

		if ($totalPages > 1) {

			if (isset($_GET['page']) && (int) $_GET['page'] > 0) {

				$pageNumber = (int) $_GET['page'];

			} else {

				$pageNumber = 1;

			}

			// print 'previous' link only if we're not

			// on page one

			if ($pageNumber > 1) {

				$page = $pageNumber - 1;

				if ($page > 1) {

					$prev = "<li><a href=\"$self?page=$page/\">&laquo;</a></li>";

				} else {

					$prev = "<li><a href=\"$self?page=1\">&laquo;</a></li>";

				}

				$first = "<li><a href=\"$self?page=1\">&laquo;&laquo;</a></li> ";

			} else {

				$prev = ''; // we're on page one, don't show 'previous' link

				$first = ''; // nor 'first page' link

			}

			// print 'next' link only if we're not

			// on the last page

			if ($pageNumber < $totalPages) {

				$page = $pageNumber + 1;

				$next = "<li><a href=\"$self?page=$page\">&raquo;</a></li>";

				$last = "<li><a href=\"$self?page=$totalPages\">&raquo;&raquo;</a></li>";

			} else {

				$next = ''; // we're on the last page, don't show 'next' link

				$last = ''; // nor 'last page' link

			}

			$start = $pageNumber - ($pageNumber % $numLinks) + 1;

			$end = $start + $numLinks - 1;

			$end = min($totalPages, $end);

			$pagingLink = array();

			for ($page = $start; $page <= $end; $page++) {

				if ($page == $pageNumber) {

					$pagingLink[] = "<li class='active'><a>$page</a></li>"; // no need to create a link to current page

				} else {

					if ($page == 1) {

						$pagingLink[] = "<li><a href=\"$self?page=1\">$page</a></li>";

					} else {

						$pagingLink[] = "<li><a href=\"$self?page=$page\">$page</a></li>";

					}

				}

			}

			$pagingLink = implode('', $pagingLink);

			// return the page navigation link

			$pagingLink = '<ul class="pagination">' . $first . $prev . $pagingLink . $next . $last . '</ul>';

		}

		return $pagingLink;

	}

	function getRows($sql) {

		$sql = @mysqli_query($this->con, $sql);

		$num_rows = @mysqli_num_rows($sql);

		if ($num_rows > 0) {

			while ($row = @mysqli_fetch_assoc($sql)) {

				$data[] = $row;

			}

			return $data;

		}

	}

	function getPagingLink_search($where_link, $sql, $itemPerPage = 5, $strGet = '', $self = FALSE) {

		$result = mysqli_query($this->con, $sql);

		$pagingLink = '';

		$totalResults = mysqli_num_rows($result);

		$totalPages = ceil($totalResults / $itemPerPage);

		// how many link pages to show

		$numLinks = 10;

		// create the paging links only if we have more than one page of results

		if ($totalPages > 1) {

			if (isset($_GET['page']) && (int) $_GET['page'] > 0) {

				$pageNumber = (int) $_GET['page'];

			} else {

				$pageNumber = 1;

			}

			// print 'previous' link only if we're not

			// on page one

			if ($pageNumber > 1) {

				$page = $pageNumber - 1;

				if ($page > 1) {

					$prev = "<li><a href=\"$self?page=$page" . "$where_link/\">&laquo;</a></li>";

				} else {

					$prev = "<li><a href=\"$self?page=1" . "$where_link\">&laquo;</a></li>";

				}

				$first = "<li><a href=\"$self?page=1" . "$where_link\">&laquo;&laquo;</a></li> ";

			} else {

				$prev = ''; // we're on page one, don't show 'previous' link

				$first = ''; // nor 'first page' link

			}

			// print 'next' link only if we're not

			// on the last page

			if ($pageNumber < $totalPages) {

				$page = $pageNumber + 1;

				$next = "<li><a href=\"$self?page=$page" . "$where_link\">&raquo;</a></li>";

				$last = "<li><a href=\"$self?page=$totalPages" . "$where_link\">&raquo;&raquo;</a></li>";

			} else {

				$next = ''; // we're on the last page, don't show 'next' link

				$last = ''; // nor 'last page' link

			}

			$start = $pageNumber - ($pageNumber % $numLinks) + 1;

			$end = $start + $numLinks - 1;

			$end = min($totalPages, $end);

			$pagingLink = array();

			for ($page = $start; $page <= $end; $page++) {

				if ($page == $pageNumber) {

					$pagingLink[] = "<li class='active'><a>$page</a></li>"; // no need to create a link to current page

				} else {

					if ($page == 1) {

						$pagingLink[] = "<li><a href=\"$self?page=1" . "$where_link\">$page</a></li>";

					} else {

						$pagingLink[] = "<li><a href=\"$self?page=$page" . "$where_link\">$page</a></li>";

					}

				}

			}

			$pagingLink = implode('', $pagingLink);

			// return the page navigation link

			$pagingLink = '<ul class="pagination">' . $first . $prev . $pagingLink . $next . $last . '</ul>';

		}

		return $pagingLink;

	}

}

?>


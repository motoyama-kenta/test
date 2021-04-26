<?php
/*
配置管理画面のビュー
2021/1/14　新規作成
*/

session_start();
if (!isset($_SESSION["staffID"])) {
	header("Location:http://haichi.flc-premium.co.jp/FLC/error.php");
	exit();
} else {
	$login_staff_id = $_SESSION["staffID"];
}

if (isset($_SESSION['authority'])) {
	$authority = $_SESSION['authority'];
} else {
	$authority = 0;
}

if (isset($_SESSION["booth_list"]) && is_array($_SESSION["booth_list"])) {
	$booth_list = $_SESSION["booth_list"];
	$json_booth_list = json_encode($booth_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_booth_list = "\"\"";
}

if (isset($_SESSION["booth_management_list"]) && is_array($_SESSION["booth_management_list"])) {
	$booth_management_list = $_SESSION["booth_management_list"];
	$json_booth_management_list = json_encode($booth_management_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_booth_management_list = "\"\"";
}

if (isset($_SESSION["shift_management_list"]) && is_array($_SESSION["shift_management_list"])) {
	$shift_management_list = $_SESSION["shift_management_list"];
	$json_shift_management_list = json_encode($shift_management_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_shift_management_list = "\"\"";
}

if (isset($_SESSION["all_shift_management"]) && is_array($_SESSION["all_shift_management"])) {
	$all_shift_management = $_SESSION["all_shift_management"];
	$json_all_shift_management = json_encode($all_shift_management, JSON_UNESCAPED_UNICODE);
} else {
	$json_all_shift_management = "\"\"";
}

if (isset($_SESSION["date_staff_list"]) && is_array($_SESSION["date_staff_list"])) {
	$date_staff_list = $_SESSION["date_staff_list"];
	$json_date_staff_list = json_encode($date_staff_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_date_staff_list = "\"\"";
}

if (isset($_SESSION["shift_list"]) && is_array($_SESSION["shift_list"])) {
	$shift_list = $_SESSION["shift_list"];
	$json_shift_list = json_encode($shift_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_shift_list = "\"\"";
}

if (isset($_SESSION["staff_list"]) && is_array($_SESSION["staff_list"])) {
	$staff_list = $_SESSION["staff_list"];
	$json_staff_list = json_encode($staff_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_staff_list = "\"\"";
}

if (isset($_SESSION["sl"])) {
	$sl = $_SESSION["sl"];
	$json_sl = json_encode($sl, JSON_UNESCAPED_UNICODE);
} else {
	$json_sl = "\"\"";
}

if (isset($_SESSION["department_list"])) {
	$department_list = $_SESSION["department_list"];
	$json_department_list = json_encode($department_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_department_list = "\"\"";
}
if (isset($_SESSION["banned_list"])) {
	$banned_list = $_SESSION["banned_list"];
	$json_banned_list = json_encode($banned_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_banned_list = "\"\"";
}
if (isset($_SESSION["fix_list"])) {
	$fix_list = $_SESSION["fix_list"];
	$json_fix_list = json_encode($fix_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_fix_list = "\"\"";
}
if (isset($_SESSION["after_today_shift_data"])) {
	$after_today_shift_data = $_SESSION["after_today_shift_data"];
	$json_after_today_shift_data = json_encode($after_today_shift_data, JSON_UNESCAPED_UNICODE);
} else {
	$json_after_today_shift_data = "\"\"";
}
if (isset($_SESSION["office_work"])) {
	$office_work = $_SESSION["office_work"];
	$json_office_work = json_encode($office_work, JSON_UNESCAPED_UNICODE);
} else {
	$json_office_work = "\"\"";
}
if (isset($_SESSION["suggest_booth"]) && $_SESSION['suggest_booth'] !== '') {
	$suggest_booth = $_SESSION["suggest_booth"];
	$json_suggest_booth = json_encode($suggest_booth, JSON_UNESCAPED_UNICODE);
} else {
	$json_suggest_booth = "\"\"";
}

if (isset($_SESSION["position_list"])) {
	$position_list = $_SESSION["position_list"];
	$json_position_list = json_encode($position_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_position_list = "\"\"";
}

if (isset($_SESSION["daily_report"])) {
	$daily_report = $_SESSION["daily_report"];
	$json_daily_report = json_encode($daily_report, JSON_UNESCAPED_UNICODE);
} else {
	$json_daily_report = "\"\"";
}

if (isset($_SESSION["staff_holiday_list"])) {
	$staff_holiday_list = $_SESSION["staff_holiday_list"];
	$json_staff_holiday_list = json_encode($staff_holiday_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_staff_holiday_list = "\"\"";
}

if (isset($_SESSION["office_work_list"])) {
	$office_work_list = $_SESSION["office_work_list"];
	$json_office_work_list = json_encode($office_work_list, JSON_UNESCAPED_UNICODE);
} else {
	$json_office_work_list = "\"\"";
}


if (isset($_SESSION["memo"])) {
	$memo = $_SESSION["memo"];
} else {
}

if (isset($_SESSION["leader_request"])) {
	$leader_request = $_SESSION["leader_request"];
	$json_leader_request = json_encode($leader_request, JSON_UNESCAPED_UNICODE);
} else {
	$json_leader_request = "\"\"";
}

if (isset($_SESSION["staff_request"])) {
	$staff_request = $_SESSION["staff_request"];
	$json_staff_request = json_encode($staff_request, JSON_UNESCAPED_UNICODE);
} else {
	$json_staff_request = "\"\"";
}

if (isset($_GET["search_day"]) && $_GET["search_day"] !== "") {
	$search_day = date($_GET["search_day"]);
	$_SESSION['search_day'] = $search_day;
} else {
	if (isset($_SESSION['search_day']) && $_SESSION['search_day'] !== "") {
		$search_day = $_SESSION['search_day'];
	} else {
		$search_day = date("Y-m-d");
	}
}

if (isset($_GET["day"]) && $_GET["day"] !== "") {
	$get_day = $_GET["day"];
	$_SESSION['day'] = $get_day;
} else {
	if (isset($_SESSION['day']) && $_SESSION['day'] !== "") {
		$get_day = $_SESSION['day'];
	} else {
		$get_day = 7;
	}
}
//表示日数
$display_days = $get_day;

//1日表示の場合当日、7日は1つ前から
if ($display_days == 1) {
	$adjustment = 0;
} else {
	$adjustment = -1;
}

$today = date("Y-m-d");
$time1 = strtotime($search_day);
$time2 = strtotime($today);

$days_difference = ($time1 - $time2) / (60 * 60 * 24);
// $days_difference = 0;

//右表示用ブースリスト
$right_boothmanagement_list = array();

//id->都道府県名変換
require("f/state_info.php");

?>

<!DOCTYPE html>
<html lang="ja" id="html">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1, minimum-scale=0.25, initial-scale=0.5">
	<meta name="description" content="">
	<title>配置管理</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" media="all" href="css/management.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async></script>

	<script type="text/javascript" src="js/popover.js" async></script>
	<!-- <script type="text/javascript" src="js/drag.js"></script> -->

	<script src="js/Sortable.min.js" async></script>
	<script src="js/staff_drag.js" async></script>
	<!-- <script src="js/suggest_popup.js"></script> -->
	<script type="text/javascript" src="js/management_modal.js" async></script>
	<script type="text/javascript">
		let shift_data = <?php echo $json_after_today_shift_data ?>;
		let fix_list = <?php echo $json_fix_list ?>;
		let office_work_list = <?php echo $json_office_work_list ?>;
		let staff_holiday_list = <?php echo $json_staff_holiday_list ?>;
		let booth_management_list = <?php echo $json_booth_management_list ?>;
		let department_list = <?php echo $json_department_list ?>;
		let position_list = <?php echo $json_position_list ?>;
		let json_date_staff_list = <?php echo $json_date_staff_list ?>;
		let shift_list = <?php echo $json_shift_list ?>;
		let all_shift_management = <?php echo $json_all_shift_management ?>;
		let daily_report = <?php echo $json_daily_report ?>;
		let suggest_booth = <?php echo $json_suggest_booth ?>;
		let banned_list = <?php echo $json_banned_list ?>;
		let staff_list = <?php echo $json_staff_list ?>;
		let sl = <?php echo $json_sl ?>;
		let shift_management_list = <?php echo $json_shift_management_list ?>;
		let booth_list = <?php echo $json_booth_list ?>;
		let office_work = <?php echo $json_office_work ?>;
		let leader_request = <?php echo $json_leader_request ?>;
		let staff_request = <?php echo $json_staff_request ?>;
		let display_days = <?php echo $display_days ?>;



		$(function() {
			$(".staff1").hover(function() {
				$(this).next("strong").animate({
					opacity: "show",
					top: "-75"
				}, "slow");
			}, function() {
				$(this).next("strong").animate({
					opacity: "hide",
					top: "-85"
				}, "fast");
			});
		});

		$(document).ready(function() {
			var ua = window.navigator.userAgent.toLowerCase();

			if (ua.indexOf("windows nt") !== -1) {
				/* windowsの場合*/
				// console.log("windows");
				/* 横スクロールの保存されている数字があれば、tbodyを移動 */
				if (localStorage.getItem('t_scrollLeft') != "") {
					document.getElementById("tbody").scrollLeft = localStorage.getItem('t_scrollLeft');
				}
				/* 縦スクロールの保存されている数字があれば、全体を移動 */
				if (localStorage.getItem('t_scrollTop') != "undefined" || localStorage.getItem('t_scrollTop') != 0) {
					document.getElementById("tbody").scrollTop = localStorage.getItem('t_scrollTop');
				}
				//要検証
			} else if (ua.indexOf("android") !== -1) {
				if (localStorage.getItem('t_scrollLeft') != "") {
					document.getElementById("tbody").scrollLeft = localStorage.getItem('t_scrollLeft');
				}
				/* 縦スクロールの保存されている数字があれば、全体を移動 */
				if (localStorage.getItem('t_scrollTop') != "undefined" || localStorage.getItem('t_scrollTop') != 0) {
					document.getElementById("tbody").scrollTop = localStorage.getItem('t_scrollTop');
				}
				console.log(2);
				//要検証
			} else if (ua.indexOf("iphone") !== -1 || ua.indexOf("ipad") !== -1) {
				if (localStorage.getItem('t_scrollLeft') != "") {
					document.getElementById("tbody").scrollLeft = localStorage.getItem('t_scrollLeft');
				}
				/* 縦スクロールの保存されている数字があれば、全体を移動 */
				if (localStorage.getItem('t_scrollTop') != "undefined" || localStorage.getItem('t_scrollTop') != 0) {
					document.getElementById("tbody").scrollTop = localStorage.getItem('t_scrollTop');
				}
				console.log(1);
			} else if (ua.indexOf("mac os x") !== -1) {
				/* Macの場合*/

				/* 横スクロールの保存されている数字があれば、tbodyを移動 */
				if (localStorage.getItem('t_scrollLeft') != "") {
					document.getElementById("tbody").scrollLeft = localStorage.getItem('t_scrollLeft');
				}

				/* 縦スクロールの保存されている数字があれば、全体を移動 */
				if (localStorage.getItem('scrollTop') != "undefined" || localStorage.getItem('scrollTop') != 0) {
					$(window).scrollTop(localStorage.getItem('scrollTop'));
				}
			} else {
				console.log(1);
			}
		});

		function mailTo(url) {
			window.open("mailto:" + url);
		}

		window.addEventListener('scroll', function() {
			localStorage.setItem('scrollTop', $(window).scrollTop());
		});
	</script>

</head>

<body>

	<div id="loader-bg" class="is-hide">
		<div id="loader" class="is-hide">
			<p>
				<img src="images/pc/1495.gif"><br>
				更新中...
			</p>
		</div>
	</div>
	<div class="header">
		<div class="icon-back"><a href="http://haichi.flc-premium.co.jp/FLC/menu.php"><img class="head-b" src="images/pc/5@4x.png" alt=""></a></div>
		<DIV class="flc-logo"><img class="head-logo" src="images/pc/86@4x.png" alt=""></DIV>
		<div class="reload"><a href="http://haichi.flc-premium.co.jp/FLC/c/move_past_management.php?search_day=<?php echo $search_day; ?>">更新</a></div>
	</div>
	<div class="header-content">
		<div class="header-logo">
			<div class="header-title">配置管理</div>
		</div>
		<div class="flex-flc">
			<button id="previous"><i class="fas fa-arrow-left"></i></button>
			<form action="c/import_booth_management.php" method="post" enctype="multipart/form-data" class="booth-import">
				<input type="date" class="date" id="search_day" name="date" value="<?php echo $search_day; ?>">
				<div>
				</div>
			</form>
			<button id="next"><i class="fas fa-arrow-right"></i></button>
		</div>
		<div class="flex-a">
			<a href="http://haichi.flc-premium.co.jp/FLC/management.php?day=1&search_day=<?php echo $search_day; ?>">
				<div class="oneday">
					1日<i class="fas fa-angle-double-right" style="margin-left: 1em;"></i>
				</div>
			</a>
			<a href="http://haichi.flc-premium.co.jp/FLC/management.php?day=7&search_day=<?php echo $search_day; ?>">
				<div class="a_week">
					7日
					<i class="fas fa-angle-double-right" style="margin-left: 1em;"></i>
				</div>
			</a>
			<?php if ($authority > 2) { ?>
				<div class="js-modal4" onclick="management_holiday(<?php echo $search_day; ?>)">休日登録</div>
				<div class="js-modal5" onclick="management_office_work()">内勤登録</div>

				<a href="http://haichi.flc-premium.co.jp/FLC/c/move_last_holiday_list.php" target="_blank" rel="noopener">
					<div class="js-modal6">休日一覧</div>
				</a>
			<?php } ?>
		</div>

		<?php if ($authority > 2) { ?>
			<div class="import-wrap">
				<p>ブースインポート</p>
				<form action="c/import_booth_management.php" method="post" enctype="multipart/form-data" class="booth-import">
					<input type="file" class="file" name="tmp_file">
					<div>
						<input type="submit" class="button" value="確定">
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
	<div class='flex' id="shiftManagementModal"></div>
	<div class='flex2' id="shiftManagementModal2"></div>
	<div class='flex' id="shiftManagementModal4"></div>
	<div class='flex' id="shiftManagementModal5"></div>
	<div class="x_data_area">
		<div class="lock_box" id="tcol">
			<table class="width300 data">
				<?php if ($authority > 2) { ?>
					<div class="wrapper">
						<div class="booth">ブース名</div>

						<div class="prefectures">都道府県</div>

					</div>
				<?php } ?>
				<?php if ($authority <= 2) { ?>
					<div class="wrapper-12 wrapper">
						<div class="booth">ブース名</div>

						<div class="prefectures">都道府県</div>

					</div>
				<?php } ?>
			</table>

			<?php
			$i = 0;
			$no = 1;
			$boothID = 0;
			$total_estimate = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

			if (isset($booth_management_list) && is_array($booth_management_list)) {
				foreach ($booth_management_list as $key => $value) {
					// var_dump($value[0]);
					$display_flg = 0;
					// echo $days_difference;
					// if (isset($value[$days_difference])) {

					if ($display_days == 1 && isset($value[$days_difference][4]) && $value[$days_difference][4] !== "") {
						$display_flg = 1;
						$m = $days_difference;
					} elseif ($display_days == 7) {

						for ($k = $days_difference + $adjustment; $k < $display_days + $days_difference; $k++) {
							// var_dump($value);
							if (isset($value[$k][4]) && $value[$k][4] !== "") {
								$display_flg = 1;
								$m = $k;
								continue;
							}
						}
					} else {
					}
					if ($display_flg) {
						// echo var_dump($value;
						$k = $m;
						$right_boothmanagement_list[] = $value;
			?>
						<div class="wrapper-2">
							<div class="booth-menu wm2<?php
														$search_str = mb_convert_encoding($booth_list[$value[$k][0]][0], "UTF-8");
														$search_word = mb_convert_encoding('企画', "UTF-8");
														if ($booth_list[$value[$k][0]][15] == 1) {
															echo " alert";
														}
														if (strpos($search_str, '企画') !== false) {
															echo " planning";
														} else {
														}
														?>
								" style="width: 80%;" onclick="boothModal(<?php echo $value[$k][0]; ?>)" ontouchstart>
								<?php echo $booth_list[$value[$k][0]][0]; ?>
								<p class="tooltip">開始時間：<?php echo date("g:i", strtotime($booth_list[$value[$k][0]][12])); ?></p>
							</div>

							<div class="prefectures-menu wm" style="width: 20%;"><?php echo getStateName($booth_list[$value[$k][0]][3]); ?></div>
						</div>
			<?php
						$i++;
					}
					// } else {
					// }
					for ($j = $adjustment + $days_difference; $j < $display_days + $days_difference; $j++) {
						if (isset($value[$j][5])) {
							$total_estimate[$j] += (int)$value[$j][5];
						}
						if (isset($value[$j][4])) {
							$staff_count[$j] += (int)$value[$j][4];
						}

						if (isset($value[$j][1])) {
							$placed_count[$j] += count($shift_management_list[$value[$j][1]]);
						}
					}
					$no++;
				}
			}
			?>

		</div>
		<!-- ここから右画面-->

		<div class="x_scroll_box" id="tbody" style="overflow: auto;" onscroll="scrollRC()">
			<?php

			$count = $i;
			$n = 0;
			if ($display_days == 7) {
				$seven_days_adjustment = 1;
			} else {
				$seven_days_adjustment = 0;
			}
			//表示する日数（1週間）
			for ($j = $adjustment + $days_difference; $j < $display_days + $days_difference; $j++) {

				$day = date("Ymd", strtotime($j . 'day'));
				$holiday_get_day = date("m/d/Y", strtotime($j . 'day'));
				$number_of_booth = 0;
				$number_of_confirm_booth = 0;
				for ($i = 0; $i < $count; $i++) {
					if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
						$number_of_booth++;
					}
					if (isset($right_boothmanagement_list[$i][$j][6]) && $right_boothmanagement_list[$i][$j][6] == "確定") {
						$number_of_confirm_booth++;
					}
				}
			?>
				<?php
				$week = array(
					'日',
					'月',
					'火',
					'水',
					'木',
					'金',
					'土'
				);
				$time_w = $week[date("w", strtotime($j . 'day'))];
				?>
				<div class="width2500 data">
					<div class="dates scroll-date">
						<p style="margin: 0 5% 0 32%; color: white;font-size: 2em; color:black;"><?php echo date("Y/m/d ", strtotime($j . 'day')) . $time_w; ?></p>
						<?php if ($authority > 2) { ?>
							<span class="all-copy" onclick="staffBulkCopy('<?php echo date('Ymd', strtotime($j . 'day')); ?>')"><a class="all-btn">全配置コピー</a></span>
							<span class="all-paste" onclick="staffBulkPaste('<?php echo date('Ymd', strtotime($j . 'day')); ?>',<?php echo ($n + $adjustment + 1); ?>)"><a class="all-btn gray-peast">全配置ペースト</a></span>

						<?php } ?>
					</div>
					<div class="dates date2" style="height: 1.2em; font-size: medium;">
						<?php echo "<span class='dates-span date-color'>総ブース：$count</span>" . "<span class='dates-span date-color'>確定/開催：$number_of_confirm_booth/$number_of_booth</span>"; ?>
						<span class="dates-span date-color">総目標件数：<?php if (isset($total_estimate[$j])) {
																		echo $total_estimate[$j];
																	} ?></span>
						<?php
						// if ($authority > 2 && $j >= 0) {
						if ($authority > 2) {
						?>
							<button type="submit" form="number_target<?php echo $j ?>" class="number-submit">人数＆目標 確定</button>
						<?php
						}
						?>
						<?php
						$fix_all_flg = 1;
						for ($i = 0; $i < $count; $i++) {
							if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
								if (isset($right_boothmanagement_list[$i][$j][6]) && $right_boothmanagement_list[$i][$j][6] === "確定") {
								} else {
									$fix_all_flg = 0;
								}
							}
						}
						if ($fix_all_flg) {
						?>
							<?php
						} else {
							if ($authority > 1) {
							?>

						<?php
							}
						}
						?>
					</div>
					<div class="dates date3">
						<span class="dates-span important-num">配置人数:<span class="dates-span-child">
								<?php if (isset($placed_count[$j])) {
									echo $placed_count[$j] . "人";
								} ?></span>必要人数:<span class="dates-span-child">
								<?php if (isset($staff_count[$j])) {
									echo $staff_count[$j] . "人";
								} ?></span>未配置人数:<span class="dates-span-child"><?php
																				if (isset($placed_count[$j])) {
																					$renkin_count = 0;
																					foreach ((array)$after_today_shift_data as $renkin) {
																						if ($renkin[$n - 1] >= 6) {
																							$renkin_count += 1;
																						}
																					}

																					$haichi_staff_count = 0;
																					foreach ($staff_list as $value) {

																						if ($value[9] !== "1") {
																							$haichi_staff_count += 1;
																						}
																					}
																					echo $haichi_staff_count - ($placed_count[$j] + count($office_work_list[$holiday_get_day]) + count($staff_holiday_list[$holiday_get_day]) + $renkin_count + count($shift_list[$n])) . "人";
																					// echo "|スタッフ数:" . $haichi_staff_count . "配置済み:" .  $placed_count[$j] . "内勤:" . count($office_work_list[$holiday_get_day]) . "休日:" . count($staff_holiday_list[$holiday_get_day]) . "連勤:" . $renkin_count  . "希望休:" . count($shift_list[$n]);
																				}
																				?></span></span>
					</div>
					<?php
					$adress_list = "";
					for ($i = 0; $i < $count; $i++) {
						if (
							isset($right_boothmanagement_list[$i][$j][0]) &&
							isset($shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][0]) &&
							$staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][0]][7] !== ""
						) {
							$adress_list = $adress_list . $staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][0]][7] . ",";
						}
					}
					$adress_list = substr($adress_list, 0, strlen($adress_list) - 1);

					?>
					<div class="date-menu" id="<?php echo date("Ymd D", strtotime($j . 'day')); ?>" style="width: 100%;">
						<?php if ($authority >= 2) { ?>
							<div class="menu-item menu-x">

								<a onclick="mailTo('<?php echo $adress_list; ?>')" style="padding: 0 0.5em;">MAIL<i class="fas fa-envelope"></i></a>

							</div>
							<span class="all-yellow" onclick="managementAllConfirm(<?php echo date("Ymd", strtotime($j . 'day')) ?>)"><a class="all-btn all-all" style="display: block;">全配置確定</a></span>
						<?php } ?>
						<div class="menu-item menu-1">
							人数
						</div>
						<div class="menu-item menu-2">
							目標
						</div>
						<div class="all-copy2">
							<?php if ($authority >= 2) { ?>
								<span class="all-copy all-copys2" onclick="staffNumberCopy('<?php echo date('Ymd', strtotime($j . 'day')); ?>')"><a class="all-btn all-btn2" style="border: none;">人数＆目標コピー</a></span>
								<span class="all-paste all-paste2 gray-peast" onclick="staffNumberPaste('<?php echo date('Ymd', strtotime($j . 'day')); ?>')"><a class="all-btn all-btn2 gray-peast" style="border: none;">人数＆目標ペースト</a></span>
							<?php } ?>
						</div>
						<div style="display: flex; justify-content: flex-end; width: 100%; align-items: center;">
							<span class="memo-span">メモ</span>
							<div class="menu-8" onclick="memoOpen(<?php echo date('Ymd', strtotime($j . 'day')) . ',' . $j; ?>)">
								<form name="form1">
									<input type="hidden" name="hidden_memo" id="hidden_memo<?php echo $j; ?>" value="<?php echo $memo[date("Ymd", strtotime($j . "day"))][0] ?>">
								</form>
								<p style="color: gray;"><?php echo $memo[date("Ymd", strtotime($j . "day"))][0]; ?></p>
								<p></p>
							</div>
						</div>
					</div>
					<?php
					for ($i = 0; $i < $count; $i++) {
					?>
						<form method="post" action="c/update_number_target.php" id="number_target<?php echo $j ?>" class="border-form">
							<div class="scroll-wrapper">

								<?php
								if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
									if (isset($right_boothmanagement_list[$i][$j][6]) && $right_boothmanagement_list[$i][$j][6] === "確定") {
										if ($authority < 2) {
								?>


										<?php } else { ?>
											<div class=" confirm" onclick="managementConfirm('<?php echo $right_boothmanagement_list[$i][$j][1] ?>',1)"><a class="btn btn--orange">解除</a></div>
										<?php
										}
									} else {
										if ($authority < 2) {
										?>

										<?php
										} else {
										?>
											<div class=" confirm" onclick="managementConfirm('<?php echo $right_boothmanagement_list[$i][$j][1] ?>',0)">
												<a class="btn btn--blue">確定</a>
											</div>
											<!-- <div class=" scroll-wrap js-modal-open" onclick="managementModal( -->
									<?php
										}
									}

									?>
									<?php
									if (isset($right_boothmanagement_list[$i][$j][0])) {
										// echo date('Ymd', strtotime($j . 'day')) . substr('00000' . $right_boothmanagement_list[$i][$j][0], -5, 5) . ',' . $j . ',' . $right_boothmanagement_list[$i][$j][4] . ',' . $count . ',' . $i . ',' . date('Ymd', strtotime($j . 'day'));
									} else {
									}
									?>

								<?php
								} else {
								?>
									<div class="confirm black-c"></div>
									<div class="scroll-wrap gray" onclick="buttonClick2()">
									<?php
								}
									?>
									<?php
									if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
										if ($authority >= 2) {

									?>
											<div class="copy copy2" onclick="staffCopy('<?php echo date('Ymd', strtotime($j . 'day')) . substr('00000' . $right_boothmanagement_list[$i][$j][0], -5, 5); ?>')">
												コピー
											</div>
											<?php if (isset($right_boothmanagement_list[$i][$j][6]) && $right_boothmanagement_list[$i][$j][6] === "確定") { ?>
											<?php } else { ?>
												<div class="paste paste2 gray-peast" onclick="staffPaste('<?php echo date('Ymd', strtotime($j . 'day')) . substr('00000' . $right_boothmanagement_list[$i][$j][0], -5, 5); ?>',<?php echo $n + $adjustment + 1; ?>)">
													ペースト
												</div>
											<?php } ?>
										<?php
										}
									} else {
										?>
										<div class="copy_empty">

										</div>
										<div class="paste_empty">

										</div>
									<?php
									}
									?>
									<?php
									if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
									?>
										<input type="hidden" name="record_id[]" value="<?php echo  $right_boothmanagement_list[$i][$j][7]; ?>">
									<?php
									}
									?>
									<div class="scroll-menu" onclick="buttonClick()" style="width: 8%; border-bottom: 1px solid #b9b9b9;" style="pointer-events: none!important;">
										<p class="">
											<?php
											$booth_management_id_tmp = date('Ymd', strtotime($j . 'day')) . substr('00000' . $right_boothmanagement_list[$i][$j][0], -5, 5);

											if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
												if ($authority > 2) {
													echo '<input type="tel" name="number[]" value=' . $right_boothmanagement_list[$i][$j][4] . '>';
												} else {
													echo '<input readonly="readonly" type="tel" name="number[]" value=' . $right_boothmanagement_list[$i][$j][4] . '>';
												}
											} else {
												echo "";
											}
											?>
										</p>
									</div>
									<div class="scroll-menu " onclick="buttonClick()" style="width: 8%; border-bottom: 1px solid #b9b9b9;">
										<p class="gray-del">
											<?php
											if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
											?>
												<input type="tel" name="target[]" value="<?php
																							if (isset($right_boothmanagement_list[$i][$j][5]) && $right_boothmanagement_list[$i][$j][5] !== "") {
																								echo $right_boothmanagement_list[$i][$j][5];
																							} else {
																								echo "";
																							}
																							if ($authority > 2) {
																							} else {
																								echo "\" readonly='readonly'";
																							}
																							?>">
											<?php
											}
											?>
										</p>
									</div>
									<?php
									if (isset($right_boothmanagement_list[$i][$j][4]) && $right_boothmanagement_list[$i][$j][4] != 0) {
										if (isset($right_boothmanagement_list[$i][$j][6]) && $right_boothmanagement_list[$i][$j][6] === "確定") {
									?>
											<div class="scroll-wrap js-modal-open fixed" onclick="managementModalFix(
<?php

										} else {
											if ($authority < 2) {
?>
									<div class=" scroll-wrap js-modal-open" onclick="managementModalFix(
<?php
											} else {
?>
									<div class=" scroll-wrap js-modal-open" onclick="managementModal(
<?php
											}
										}

?>
						<?php
										if (isset($right_boothmanagement_list[$i][$j][0])) {
											echo date('Ymd', strtotime($j . 'day')) . substr('00000' . $right_boothmanagement_list[$i][$j][0], -5, 5) . ',' . $n . ',' . $right_boothmanagement_list[$i][$j][4] . ',' . $count . ',' . $right_boothmanagement_list[$i][$j][0] . ',' . date('Ymd', strtotime($j . 'day')) . ',' . $search_day;
										} else {
										} ?>
							)">
											<?php
										}
											?>
											<?php
											for ($k = 0; $k < 10; $k++) {
												if ($k == 9) {
											?>
													<div class="scroll-menu" style="width: 11%; border-right: none;" onclick="buttonClick()">
													<?php
												} else {
													?>
														<div class="scroll-menu" style="width: 11%;" onclick="buttonClick()">
														<?php
													}
													//								if ($staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $booth_management_list[$i][$j][0], -5, 5)][$k]][4] == "男性") {
													if (
														isset($right_boothmanagement_list[$i][$j][0]) &&
														isset($shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k])
													) {
														?>
															<?php
															$staff_id = $staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][0];
															$day1 = date("Ymd", strtotime($banned_list[$right_boothmanagement_list[$i][$j][0]][$staff_id][2]));

															$staff_department = $department_list[$staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][5]][3];
															$staff_position = $position_list[$staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][2]][4];
															$staff_name = $staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][1] . $staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][6];

															if ($day1 !== "19700101" && $day1 <= $day) {
																if ($staff_id == $login_staff_id) {
															?>
																	<p class="red border_red">
																	<?php
																} else {
																	?>
																	<p class="red">
																	<?php
																}
																	?>
																	<?php
																	echo $staff_department . $staff_position . '<br>' . $staff_name;
																} elseif (
																	$staff_list[$shift_management_list[date("Ymd", strtotime($j . "day")) . substr("00000" . $right_boothmanagement_list[$i][$j][0], -5, 5)][$k]][4] == "男性"
																) {
																	if ($staff_id == $login_staff_id) {
																	?>
																	<p class="blue border_red">
																	<?php
																	} else {
																	?>
																	<p class="blue">
																	<?php
																	}
																	?>
																	<?php
																	echo $staff_department . $staff_position . '<br>' . $staff_name;
																} else {
																	if ($staff_id == $login_staff_id) {
																	?>
																	<p class="pink border_red">
																	<?php
																	} else {
																	?>
																	<p class="pink">
																	<?php
																	}
																	?>
																<?php
																	echo $staff_department . $staff_position . '<br>' . $staff_name;
																}
																?>
																	</p>
																<?php
															} else {
																?>
																	<p class="">
																		<?php
																		echo "";
																		?>
																	</p>
																<?php
															}
																?>
														</div>

													<?php
												}
													?>
													</div>
											</div>

										<?php
									}
										?>
									</div>
						</form>
					<?php
					$n += 1;
				}
					?>
				</div>
		</div>
		<div class="flex" id="shiftManagementModal3">
			<div class="modal-memo">
				<button id="close-btn2" class="modal-close2">✖</button>
				<p class="memo-title"><span id="abc"></span></p>

				<?php
				if ($authority < 2) {
				?>
					<form name="memo_form">
						<div class="memo-text">
							<textarea name="memo" id="" cols="30" rows="10" readonly></textarea>

						</div>
						<div class="submit-div">
							<input type="hidden" name="memo_date" id="memo_date" value="">
						</div>
					</form>
				<?php
				} else {
				?>
					<form action="c/update_suggested_memo_registration.php" name="memo_form" method="post">
						<div class="memo-text">
							<textarea name="memo" id="" cols="30" rows="10"></textarea>
						</div>
						<div class="submit-div">
							<input type="hidden" name="memo_date" id="memo_date" value="">
							<input type="submit" value="更新" class="submit">
						</div>
					</form>
				<?php
				}
				?>
			</div>
		</div>

		<div id="testModal" class=""></div>

		<script>
			document.querySelector('#tbody').addEventListener('scroll', function() {
				localStorage.setItem('t_scrollTop', document.getElementById("tbody").scrollTop);
				localStorage.setItem('t_scrollLeft', document.getElementById("tbody").scrollLeft);
			});
		</script>
		<script type="text/javascript" src="js/management_staff_modal.js"></script>
		<script type="text/javascript" src="js/management_memo.js"></script>
		<script type="text/javascript" src="js/management_copy_and_paste.js"></script>
		<script type="text/javascript" src="js/management_confirm.js"></script>
		<script type="text/javascript" src="js/test.js"></script>
		<script type="text/javascript" src="js/management_search_day.js"></script>

</body>

</html>

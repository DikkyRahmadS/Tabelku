<?php 

function app_name()
{
	return "Tabelku";	
}
function app_brand()
{
	return "Tabel<span>ku</span>";	
}
function app_web($atribut)
{
	$ci = get_instance();
	$app = $ci->db->get_where('app', ['id' => 1])->row_array();
	return $app[$atribut];
}
function app_tampilan($atribut)
{
	$ci = get_instance();
	$tampilan = $ci->db->get_where('tampilan', ['id' => 1])->row_array();
	return $tampilan[$atribut];
}
function creator_name()
{
	return "Titik Rahmawati";	
}

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else{
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);
		$queryMenu = $ci->db->get_where('user_menu', ['REPLACE(menu, " ", "") =' => $menu])->row_array();
		$menu_id = $queryMenu['id'];
		$userAccess = $ci->db->get_where('user_access_menu', ['role_id'=> $role_id, 'menu_id' => $menu_id]);
		if ($userAccess->num_rows()<1) {
			redirect('auth/blocked');
		}
	}
}
function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}


function get_rowid_cart($id)
{
	$ci = get_instance();
	
	$rowid = '';
	foreach ($ci->cart->contents() as $item) {
		if ($item['id']==$id) {
			$rowid = $item['rowid'];
			break;
		}
	}
	return $rowid;
}

function acak($panjang){
	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter[$pos];
	}
	return $string;
}


function cari_tanggal($tanggal)
{
    $bulan = '';
    switch (date('n',strtotime($tanggal))) {
        case 1: $bulan = 'Januari'; break;
        case 2: $bulan = 'Februari'; break;
        case 3: $bulan = 'Maret'; break;
        case 4: $bulan = 'April'; break;
        case 5: $bulan = 'Mei'; break;
        case 6: $bulan = 'Juni'; break;
        case 7: $bulan = 'Juli'; break;
        case 8: $bulan = 'Agustus'; break;
        case 9: $bulan = 'September'; break;
        case 10: $bulan = 'Okteber'; break;
        case 11: $bulan = 'November'; break;
        case 12: $bulan = 'Desember'; break;
    }

    return date('j',strtotime($tanggal))." $bulan ".date('Y',strtotime($tanggal));
}
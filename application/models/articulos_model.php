<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articulos_model extends CI_Model {
	// Genera el listado de articulos
	function lista_articulos() {
		/*$this->db->order_by('id_articulo', 'desc');
		$consulta = $this->db->get('articulos');
		return $consulta->result();*/
		// Retornar los datos en forma de arreglo
		// return $consulta->result_array();
	}
	// Genera los detalles de un articulo por su URL
	function detalle_articulo($url_articulo) {
		/*$this->db->where('url_articulo', $url_articulo);
		$consulta = $this->db->get('articulos');
		return $consulta->row();*/
	}
	// Genera los detalles de un articulo por su nombre
	// function detalle_articulo($nombre_articulo) {
	// 	$this->db->where('nombre_articulo', $nombre_articulo);
	// 	$consulta = $this->db->get('articulos');
	// 	return $consulta->row();
	// }
	// Genera los detalles de un articulo por ID
	// function detalle_articulo($id_articulo) {
	// 	$this->db->where('id_articulo', $id_articulo);
	// 	$consulta = $this->db->get('articulos');
	// 	return $consulta->row();
	// }
}
/* End of file articulos_model.php */
/* Location: ./application/models/articulos_model.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_booking extends CI_Model 
{ 

	var $table                = 'booking';
    var $table_detail         = 'booking_detail';
    var $table_history        = 'booking_history';
    var $table_contact_person = 'booking_cp';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function insert_detail($data)
    {
        $this->db->insert($this->table_detail, $data);
    }

    public function insert_history($data)
    {
        $this->db->insert($this->table_history, $data);
    }

    public function insert_contact_person($data)
    {
        $this->db->insert($this->table_contact_person, $data);
    }

    public function update($item_id, $data)
    {
        $this->db->where('booking_id', $item_id);
        $this->db->update($this->table, $data);
    }

	public function get_booking_code_and_payment_status_by_booking_id($booking_id) { 
		$this->db->select('booking.booking_code');
		$this->db->join('booking_detail','booking.booking_id = booking_detail.booking_id');
		$query = $this->db->get_where($this->table, array('booking.flag' => 1, 'booking.booking_id' => $booking_id));
		$result = $query->row_array();

		return $result;
	}

	public function get_booking_detail_by_booking_id_for_insurance($booking_id) { 
		$this->db->select('
            booking.booking_id AS id, 
            booking_detail.dp_date_payment, 
            booking_detail.dp_reference, 
            booking_detail.dp_number, 
            booking_detail.full_date_payment, 
            booking_detail.full_reference, 
            booking_detail.full_number, 
            booking_detail.date_added, 
            admin.admin_name'
        );
        $this->db->join('booking_detail','booking.booking_id = booking_detail.booking_id');
        $this->db->join('admin','booking_detail.added_by = admin.admin_id','left');
        $query = $this->db->get_where('booking', array('booking.flag' => 1, 'booking_detail.item_type' => 3, 'booking.booking_id' => $booking_id));
        $result = $query->row_array();

        return $result;
	}

    public function get_booking_by_booking_code($booking_code) { 
        $this->db->where('booking_code', $booking_code);
        $query = $this->db->get($this->table);
        
        if($query->num_rows()>0) { 
            return $query->row_array();
        } else { 
            return '';
        }
    }

}
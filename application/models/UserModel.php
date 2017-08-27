<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function createUser(){
    	$data = array(
    		'username'=>$this->input->post('username'),
    		'password'=>md5($this->input->post('psd')),
            'name'=>$this->input->post('nama'),
            'kelompokid'=>$this->input->post('status'),
            'jurusanid'=>$this->input->post('jurusanid'),
            'tahunid'=>$this->input->post('tahun'),
            'level'=>2
    		);
    	$this->db->insert('users',$data);
    }

    function ListKelompok()
    {
        $query = $this->db->query('SELECT * FROM kelompok where kelompok != "Administrator" ');
        $res= array();
        $i = 0;
        foreach ($query -> result() as $row) {
            $res[$i]['idkelompok'] = $row->idkelompok;
            $res[$i]['kelompok'] = $row->kelompok;
            $i++;
        }
        print_r($res);
        return $res;
    }

    function ListJurusan()
    {
        $data = $this->input->post('status');
        if(isset($data) && !empty($data)){
        // echo "Choose Gedung";    
        $query =$this->db->query("SELECT * FROM jurusan where kelompokid = '".$data."'");
        $res = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $res[$i]['idjurusan']= $row->idjurusan;
            $res[$i]['jurusan'] = $row->jurusan;
            $i++;
        }
        print_r($res);
        return $res;
        }else{
            //echo "Choose Kelompok";
        }        
    } 

    function ListTahun()
    {
        $data = $this->input->post('jurusanid');
        if(isset($data) && !empty($data)){
        // echo "Choose Gedung";    
        $query =$this->db->query("SELECT * FROM tahun where jurusanid = '".$data."'");
        $res = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $res[$i]['idtahun']= $row->idtahun;
            $res[$i]['tahun'] = $row->tahun;
            $i++;
        }
        //print_r($res);
        return $res;
        }else{
            //echo "Choose Kelompok";
        }   
    }   


    function ListMahasiswa(){
        $query = $this->db->query('SELECT users.id, users.username, users.password, users.name,kelompok.idkelompok, kelompok.kelompok,jurusan.idjurusan,jurusan.jurusan,tahun.idtahun, tahun.tahun from users join kelompok on idkelompok = users.kelompokid join jurusan on idjurusan = users.jurusanid join tahun on idtahun = users.tahunid where kelompok = "Mahasiswa" and level = 2 ORDER BY id');
        $res = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $res[$i]['id']= $row->id;
            $res[$i]['username'] = $row->username;
            $res[$i]['password'] = $row->password;
            $res[$i]['name']= $row->name;
            $res[$i]['kelompok']= $row->kelompok;
            $res[$i]['jurusan']=$row->jurusan;
            $res[$i]['tahun']=$row->tahun;
            $i++;
        }
        //print_r($res);
        return $res;
    }

    function ListDosen(){
         $query = $this->db->query('SELECT users.id, users.username, users.password, users.name,kelompok.idkelompok, kelompok.kelompok,jurusan.idjurusan,jurusan.jurusan,tahun.idtahun, tahun.tahun from users join kelompok on idkelompok = users.kelompokid join jurusan on idjurusan = users.jurusanid join tahun on idtahun = users.tahunid where kelompok= "Dosen" and level = 2 ORDER BY id');
        $res = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $res[$i]['id']= $row->id;
            $res[$i]['username'] = $row->username;
            $res[$i]['password'] = $row->password;
            $res[$i]['name']= $row->name;
            $res[$i]['kelompok']= $row->kelompok;
            $res[$i]['jurusan']=$row->jurusan;
            $res[$i]['tahun']=$row->tahun;
            $i++;
        }
        return $res;
    }

     function ListPegawai(){
         $query = $this->db->query('SELECT users.id, users.username, users.password, users.name,kelompok.idkelompok, kelompok.kelompok,jurusan.idjurusan,jurusan.jurusan,tahun.idtahun, tahun.tahun from users join kelompok on idkelompok = users.kelompokid join jurusan on idjurusan = users.jurusanid join tahun on idtahun = users.tahunid where kelompok= "Pegawai" and level = 2 ORDER BY id');
        $res = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $res[$i]['id']= $row->id;
            $res[$i]['username'] = $row->username;
            $res[$i]['password'] = $row->password;
            $res[$i]['name']= $row->name;
            $res[$i]['jurusan']= $row->jurusan;
            $res[$i]['kelompok']=$row->kelompok;
            $res[$i]['tahun']=$row->tahun;
            $i++;
        }
        return $res;
    }

    // function updateUser()
    // {
    //     $data = array(
    //         'username'=>$this->input->post('username'),
    //         'password'=>md5($this->input->post('psd')),
    //         'name'=>$this->input->post('nama'),
    //         'kelompokid'=>$this->input->post('kelompokid'),
    //         'jurusanid'=>$this->input->post('jurusanid'),
    //         'tahun'=>$this->input->post('tahun'),
    //         'level'=>2
    //         );
    //     $this->db->where('id',$this->input->post('id'));
    //     $this->db->update('users',$data);
    // }

    function ProfilUser()
    {
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $q = $this->db->get('users');
        $get = $q->result_array();
        $old = $get[0]['username'];
        if($this->input->post('username') == $old){
        $data = array(
            'name'=>$this->input->post('nama'),
            'kelompokid'=>$this->input->post('status'),
            'jurusanid'=>$this->input->post('jurusanid'),
            'tahunid'=>$this->input->post('tahun'),
            'level'=>2
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);    
        }
    }

    // function UserPass()
    // {
    //     $data = array(
    //         'name'=>$this->input->post('nama'),
    //         'username'=>$this->input->post('username'),
    //         'username' =>$this->input->post('username'),
    //         'password'=>md5($this->input->post('psd')),
    //         );
    //     $this->db->where('id',$this->input->post('id'));
    //     $this->db->update('users',$data);
    // }

    function PasswordEdit()
    {
        $data = array(
            'password'=>md5($this->input->post('psd'))
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
    }

    function getUser($id)
    {
        $this->db->where('id',$id);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('kelompok','idkelompok = users.kelompokid');
        $this->db->join('jurusan','idjurusan = users.jurusanid');
        $this->db->join('tahun','idtahun = users.tahunid');
        $query = $this->db->get();
        $res = array();
            foreach ($query->result() as $row) {
                $res['id']= $row->id;
                $res['username'] = $row->username;
                $res['password'] = $row->password;
                $res['name']= $row->name;
                $res['kelompok']= $row->kelompok;
                $res['kelompokid']=$row->kelompokid;
                $res['jurusan']=$row->jurusan;
                $res['jurusanid'] = $row->jurusanid;
                $res['tahunid'] = $row->tahunid;
                $res['tahun']=$row->tahun;
            }
            //print_r($res);
           // print_r($res["kelompok"]);
           return $res;
    }
    function deleteUser($userid)
    {

        $this->db->delete('validate',array('val_user'=>$userid));
        //$this->db->delete('ruangan',array('gedungid'=>$id));
        $this->db->delete('users',array('id'=>$userid));
    }
    function isAvail($id) {
        $this->db->where("id",$id);
        $query=$this->db->get("users");
        if($query->num_rows() > 0) {
          return true;
        } else {
          return false;
        }
      }

    // function currentid() {
    //    $this->db->select_max('id');
    //    $query = $this->db->get('gedung');
    //    $result = $query->result();
    //    return $result[0]->id;
    // }

    function savekul()
    {
        $data = array('ged_id'=>$this->input->post('gedung'),
            'r_id'=>$this->input->post('ruangan'),
            'pj_matkul'=>$this->input->post('matakuliah'),
            'jam'=>$this->input->post('tanggal'),
            'n_kegiatan'=> $this->input->post('pengganti'),
            'val_user'=>$this->session->userdata('logged_in')['id'],
            'status'=>"Verification",
            'read'=>'Belum',
            'type'=>'Active',
            );
        $this->db->insert('validate',$data);
    }

    function savecul()
    {
        $data = array('ged_id'=>$this->input->post('gedung'),
            'r_id'=>$this->input->post('ruangan'),
            'pj_umum'=> $this->input->post('pj_umum'),
            'n_kegiatan'=> $this->input->post('kegiatan'),
            'jam'=>$this->input->post('date'),
            'val_user'=>$this->session->userdata('logged_in')['id'],
            'status'=>"Verification",
            'read'=>'Belum',
            'type'=>'Active',
            );
        $this->db->insert('validate',$data);
    }

    function checkVal($id,$ruangan,$jam){
        $this->db->select('*');
        $this->db->from('validate');
        $this->db->where('val_user',$id);
        $this->db->where('r_id',$ruangan);
        $this->db->where('jam',$jam);
        $query = $this->db->get();
        $data = $query->result_array();
        //print_r($data);
        return $query->result_array();
    }

    function peminjaman($from,$to,$user)
    {
         $this->db->select('id,val_user,gedungid,gedung,idruangan,ruangan,idjenis,jenis_ruangan,idkegiatan,kodekegiatan,kegiatan,penanggungjawab,pj_umum,n_kegiatan,jam,time(jam) as hours,realtime,status');
        //$this->db->select('*');
        $this->db->from('validate');
        $this->db->join('ruangan','ruangan.idruangan = validate.r_id','left outer');
        $this->db->join('jenis_ruangan','jenis_ruangan.idjenis = jenis','left outer');
        $this->db->join('gedung','gedung.idgedung = gedungid','left outer');
        $this->db->join('kegiatan','kegiatan.idkegiatan = pj_matkul','left outer');
        $this->db->limit($from,$to);
        $this->db->where('val_user',$user);
        $query = $this->db->get();
         if($query -> num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
        
        //$data = $query -> result_array();
        //print_r($data);
        // return $query -> result_array();
    }

    function recorddata($user){
        $this->db->select('*');
        $this->db->from('validate');
        $this->db->where('val_user',$user);
        // $this->db->count_all('validate');
        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteValidate($id){
        $user = $this->session->userdata('logged_in')['id'];
        $this->db->select('*');
        $this->db->from('validate');
        $this->db->where('val_user',$user);
        $query = $this->db->get();
        $data = $query -> result_array();
        //print_r($data);
        if($data[0]['val_user']){
            $this->db->delete('validate',array('id'=>$id));    
        }else{
            redirect('home');
        }
        
    }

    function beforeRead($id){

        $this->db->select('*');
        $this->db->from('validate');
        if($this->session->userdata('logged_in')['level']== 1){
            $this->db->where('status','Verification');
        }else{
            $this->db->where('val_user',$id);
            $this->db->where('read',"Belum");
            $this->db->where('type !=','Hidden');
        }
        $query= $this->db->get();
        $data = $query->result_array();
        
        return $query->result_array();
    }

    function data($id){
        $this->db->select('*');
        $this->db->from('validate');
        if($this->session->userdata('logged_in')['level'] == 1){
            $this->db->join('gedung','idgedung = ged_id','left outer');
            $this->db->where('status !=','Reject');
            $this->db->where('val_user !=',1);    
        }else{
            $this->db->where('val_user',$id);
            $this->db->where('type !=','Hidden');     
        }

        //$this->db->where('read',"Belum");
        //$this->db->where('realtime <',$param);
        $this->db->order_by('realtime','desc');
         $this->db->limit(5);
        $query= $this->db->get();
        $data = $query->result_array();
        
        return $query->result_array();
    }



    function getAllNotif($id)
    {  
        $this->db->select('*');
        $this->db->from('validate');
        $this->db->where('val_user',$id);
        //$this->db->where('read');
        $this->db->order_by('realtime','desc');
        $old = $this->db->get();
        $olddata = $old->result_array();
        foreach ($olddata as $row) {
            if($row['read'] == "Belum"){
                $data = array(
                    'read'=>"Sudah",
                    );
                $this->db->where('val_user',$id);
                $this->db->update('validate',$data);
            }
        }
        //print_r($olddata);
        return $olddata;   
    }

    function fetchNotif($limit,$page,$user){
         $this->db->select('validate.id,users.id as usersid,users.name,jurusan.jurusan,kelompok.kelompok,gedungid,gedung,idruangan,ruangan,idjenis,jenis_ruangan,idkegiatan,kodekegiatan,kegiatan,penanggungjawab,pj_umum,n_kegiatan,jam,time(jam) as hours,realtime,read,status');
        //$this->db->select('*');
          $this->db->from('validate');
        $this->db->join('ruangan','ruangan.idruangan = validate.r_id','left outer');
        $this->db->join('jenis_ruangan','jenis_ruangan.idjenis = jenis','left outer');
        $this->db->join('gedung','gedung.idgedung = gedungid','left outer');
        $this->db->join('kegiatan','kegiatan.idkegiatan = pj_matkul','left outer');
        $this->db->join('users','users.id = val_user','left outer');
        $this->db->join('tahun','tahun.idtahun = tahunid','left outer');
        $this->db->join('jurusan','jurusan.idjurusan = tahun.jurusanid','left outer');
        $this->db->join('kelompok','kelompok.idkelompok = tahun.kelompokid','left outer');
        //$this->db->from('validate');
        $this->db->limit($limit,$page);
        // $this->db->where('id',$id);
        if($this->session->userdata('logged_in')['level'] == 1){
          $this->db->where('status !=','Reject'); 
          $this->db->where('val_user !=',1);
          // $this->db->where('status')  
        }else{
          $this->db->where('val_user',$user);
          $this->db->where('type !=','hidden');
        }
        $this->db->order_by('realtime','desc');
        $query = $this->db->get('');
        if($query -> num_rows()>0){
            foreach ($query-> result() as $row) {
                if($row->read == "Belum"){
                    $data= array(
                        'read'=>"Sudah",
                        );
                    $this->db->where('val_user',$user);
                    $this->db->update('validate',$data);
                }
                $data1[] =$row ;      
            }
            print_r($data1);
            return $data1;
        }
        return false;
    }

     function hiddenNotif($id,$user){
        $data = array(
            'read'=>"Hidden",
            );
        $this->db->where('id',$id);
        $this->db->where('val_user',$user);
        $this->db->update('validate',$data);
        //$query = $this->db->get('validate');
    }



}
?>
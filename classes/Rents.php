<?php
require_once('../config.php');
class Rents extends DBConnection
{
    private $settings;
    public function __construct()
    {
        global $_settings;
        $this->settings = $_settings;
        parent::__construct();
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    function capture_err()
    {
        if (!$this->conn->error)
            return false;
        else {
            $resp['status'] = 'failed';
            $resp['error'] = $this->conn->error;
            return json_encode($resp);
            exit;
        }
    }
    function rent_unit()
    {
        extract($_POST);
        $data = "";
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('id', 'password'))) {
                if (!empty($data)) $data .= " , ";
                $data .= " {$k} = '{$v}' ";
            }
        }
        if (!empty($tenant_id) && !empty($rent_id)) {
            $sql = "INSERT INTO `rent_list`set {$data} ";
        }
        $save = $this->conn->query($sql);
        if ($save) {
            $resp['status'] = 'success';
            if (empty($id))
                $this->settings->set_flashdata('success', "New Unit successfully saved.");
            else
                $this->settings->set_flashdata('success', "Unit successfully updated.");
        } else {
            $resp['status'] = 'failed';
            $resp['err'] = $this->conn->error . "[{$sql}]";
        }
        return json_encode($resp);
    }
}

$Rent = new Rents();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
    case 'rent_unit':
        echo $Rent->rent_unit();
        break;

    default:
        // echo $sysset->index();
        break;
}

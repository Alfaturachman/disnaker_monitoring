<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->model(['MediaModel', 'KategoriModel']);

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }

        $userType = $this->session->userdata('user_type');
        if (!in_array($userType, ['admin', 'pemimpin'])) {
            $this->session->set_flashdata('message', 'Anda tidak memiliki akses ke halaman ini!');
            redirect('home');
        }
    }

    public function index()
    {
        $bulan = $this->input->get('bulan');
        $action = $this->input->get('action');

        if ($action === 'cetak' && $bulan) {
            $data['title'] = "Laporan Media Trend Bulan " . $this->get_nama_bulan($bulan);
            $data['media'] = $this->MediaModel->get_media_by_month($bulan);

            $html = $this->load->view('backend/pdf/laporan_trend_bulan', $data, true);

            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("laporan_media_bulan_$bulan.pdf", ['Attachment' => 0]);
            return;
        }

        $data['medias'] = $bulan ? $this->MediaModel->get_media_by_month($bulan) : [];

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/laporan/view', $data);
        $this->load->view('backend/partials/footer');
    }

    private function get_nama_bulan($bulan)
    {
        $nama_bulan = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember",
        ];

        return $nama_bulan[$bulan] ?? "Tidak Diketahui";
    }
}

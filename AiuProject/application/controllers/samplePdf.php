class samplepdf extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->printPdf();
    }

    private function printPdf()
    {
        // PDFライブラリ呼出
        $this->load->library('pdf');

        // ページ向き(横)
        $pageOrientation = 'L';
        // ページフォーマット
        $pageFormat = 'A4';

        $pdf = new TCPDF($pageOrientation, 'pt', $pageFormat, true, 'UTF-8', false);

        ここにTCPDFのロジック

        $pdf->Close();
        $pdf->Output("ファイル名".'.pdf','I');

        exit;
    }
}
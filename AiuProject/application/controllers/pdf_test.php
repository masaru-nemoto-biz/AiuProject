<?php
/*
class pdf_test extends CI_Controller {
 
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
 
        //ここにTCPDFのロジック
 
        $pdf->Close();
        $pdf->Output("ファイル名".'.pdf','I');
 
        exit;
    }
}
?>
*/

class Pdf_test extends CI_Controller {
 public function __construct() {
  parent::__construct();
 }

function index()
    {
        $this->load->library('pdf');
        $PONO=$this->input->post('ONO');

        // set document information
        $this->pdf->SetSubject('TCPDF Tutorial');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');
  // デフォルトでヘッダーに余計な線が出るので削除
  $this->pdf->setPrintHeader(false);
  $this->pdf->setPrintFooter(false);

  // 1ページ目を準備
  $this->pdf->AddPage();

  // フォントを指定 ( 小塚ゴシックPro M を指定 )
  // 日本語を使う場合は、日本語に対応しているフォントを使う
  $this->pdf->SetFont('kozgopromedium', '', 10);

  // h1 で見出しを出力 ( HTML )
  $this->pdf->writeHTML('<h1>'.'印刷テスト'.'</h1>', false, false, false, false, 'C');
$this->pdf->setPage( '1', true );
  // PDF を出力 ( I = ブラウザ出力, D = ダウンロード, F = ローカルファイルとして保存, S = 文字列として出力 )
  $this->pdf->Output("sample.pdf", "I");
 }
}
?>
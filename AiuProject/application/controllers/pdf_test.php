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
  
  $this->pdf->Cell( 0, 8, '平成27年2月8日', 1, 1, 'R');
  $cell_01 = '<span style="font-size:35px;">書類送付状</span>';
  $cell_02 = '<span style="font-size:16px;">「企業名記入欄」</span><br><span style="font-size:16px;">「担当者名名記入欄」</span>';
  $cell_03 = '<span style="font-size:13px;">ライフコンシェルジュ株式会社<br>担当：担当者名<br></span><span style="font-size:11px;">〒151-0053<br>東京都渋谷区代々木2-14-5　F2ビル6階<br>TEL：03-5309-2503　FAX：03-6800-2509<br>Mail：担当者苗字（英語小文字）@hoken-design.jp</span>';
  $cell_04 = '<span style="font-size:13px;">「議題記入欄の件」</span>';
  $cell_05 = '<span style="font-size:11px;">いつも大変お世話になっております。</span>';
  $cell_06 = '<span style="font-size:11px;">日頃は弊社業務に関し、格別のご高配を賜わり誠にありがとうございます。</span>';
  $cell_07 = '<span style="font-size:11px;">さっそくですが、以下書類をお送り致しますので、ご査収の程よろしくお願い申し上げます。</span>';
  $cell_08 = '<span style="font-size:11px;">＜送付書類明細＞</span>';
  $cell_09 = '<span style="font-size:11px;">以上、よろしくお願い申し上げます</span>';
  $cell_10 = base_url() .'uploads/logo2.jpg';
  $cell_11 = base_url() .'uploads/logo.jpg';
  $this->pdf->writeHTMLCell( 0, 20, '', '', $cell_01, 1, 1, false, true, 'C');
  $this->pdf->writeHTMLCell( 80, 45, '', '', $cell_02, 1, 0, false, true, 'L');
  $this->pdf->writeHTMLCell( 40, 45, '', '', '', 1, 0, false, true, 'L');
  $this->pdf->writeHTMLCell( 70, 45, '', '', $cell_03, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 10, '', '', $cell_04, 1, 1, false, true, 'C');
  $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_05, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_06, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_07, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_09, 1, 1, false, true, 'L');
  $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true);
  $this->pdf->Image($cell_10, '95', '40', 30, '', '', '', '', false, '300');
  $this->pdf->Image($cell_11, '', '', 50, '', '', '', '', false, '300', 'R');
//  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
  $this->pdf->Output("sample.pdf", "I");
 }
}
?>
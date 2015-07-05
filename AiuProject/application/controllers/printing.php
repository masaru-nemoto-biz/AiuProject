<?php
class Printing extends CI_Controller {
    
    var $message;
    var $acc_id;
    
    function Printing() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('corpStatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        $this->load->model('accident_model');
        $this->load->model('history_model');
                        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $this->session->unset_userdata('seach_obj');
        $data['message'] = $this->session->userdata('message_printing');
        $data['mst_print_documents'] = $this->master_model->mst_print_documents();
        $data['list'] = $this->corpStatus_model->get_company_list();
        $this->load->view('printing_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function conform() {
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message_printing');
        
        if ($data['move'] == '印刷情報入力・確認') {
            $this->printing_docments();
        } elseif ($data['move'] == '印刷' and $this->session->userdata('print_type') == '1') {
            $this->printing_conform();
        } elseif ($data['move'] == '印刷' and $this->session->userdata('print_type') == '2') {
            $this->printing_conform2();
        } else {
            $this->index();
        }
    }

    /*
     * 契約情報追加/変更画面へ
     */
    function printing_docments() {
                
        $data['check'] = $this->input->post('check_radio1');
        $data['check2'] = $this->input->post('check_radio2');
        
        if (empty($data['check'])) {
            // チェックなしの場合は自画面遷移
            $message = '印刷したい書類にチェックを入れてください';
            $this->session->set_userdata('message_printing', $message);
            redirect('printing/index');
        } elseif (empty($data['check2'])) {
            // チェックなしの場合は自画面遷移
            $message = '印刷したい企業にチェックを入れてください';
            $this->session->set_userdata('message_printing', $message);
            redirect('printing/index');
        }
        
        $data['company_data'] = $this->corpStatus_model->get_company_data($data['check2'])->row(0);
        $data['representative_data'] = $this->corpStatus_model->get_representative_data($data['check2'])->row(0);
        $data['contract'] = $this->corpStatus_model->get_contract_data($data['check2'])->row(0);
        $this->session->set_userdata('corp_name', $data['company_data']->corp_name);
        $this->session->set_userdata('post', $data['company_data']->post);
        $this->session->set_userdata('corp_address', $data['company_data']->corp_address);
        $this->session->set_userdata('fax', $data['company_data']->fax);
        $this->session->set_userdata('contract_name', $data['contract']->contract_name);
        
        $this->session->set_userdata('contracter_type', $data['company_data']->contracter_type);
        $this->session->set_userdata('representative_name', $data['representative_data']->representative_name);
        
        $this->session->set_userdata('print_type', $data['check']);
        
        if ($data['check'] == '1') {
            $this->load->view('printing_conform_view');
        } elseif ($data['check'] == '2') {
            $this->load->view('printing_conform_view');
        } elseif ($data['check'] == '3') {
            $this->printing_conform3();
        } elseif ($data['check'] == '4') {
            $this->printing_conform4();
        } elseif ($data['check'] == '5') {
            $this->printing_conform5();
        }
    }

    /*
     * 書類送付状 印刷画面
     */
    function printing_conform() {
        
        $this->load->library('pdf');

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
  
        $this->pdf->Cell( 0, 8, mdate('%Y年%m月%d日'), 1, 1, 'R');
        $cell_01 = '<span style="font-size:35px;">書類送付状</span>';
        if ($this->session->userdata('contracter_type') == '1') {
            $cell_02 = '<span style="font-size:14px;">'.$this->session->userdata('corp_name').'</span><br><span style="font-size:14px;">'.$this->input->post('rep').' 様</span>';
        } else {
            $cell_02 = '<span style="font-size:14px;">'.$this->input->post('title').' 様</span>';
        }
        $cell_03 = '<span style="font-size:13px;">ライフコンシェルジュ株式会社<br>担当：'.$this->session->userdata('user_name').'<br></span><span style="font-size:11px;">〒151-0053<br>東京都渋谷区代々木2-14-5　F2ビル6階<br>TEL：03-5309-2503　FAX：03-6800-2509<br>Mail：'.$this->session->userdata('user_mail_address').'</span>';
        $cell_04 = '<span style="font-size:13px;">'.$this->input->post('title').'</span>';
        $cell_05 = '<span style="font-size:11px;">いつも大変お世話になっております。</span>';
        $cell_06 = '<span style="font-size:11px;">日頃は弊社業務に関し、格別のご高配を賜わり誠にありがとうございます。</span>';
        $cell_07 = '<span style="font-size:11px;">さっそくですが、以下書類をお送り致しますので、ご査収の程よろしくお願い申し上げます。</span>';
        $cell_08 = '<span style="font-size:11px;">＜送付書類明細＞</span>';
        $cell_08_1 = '<span style="font-size:11px;">'.$this->input->post('document1').'</span>';
        $cell_08_2 = '<span style="font-size:11px;">'.$this->input->post('document2').'</span>';
        $cell_08_3 = '<span style="font-size:11px;">'.$this->input->post('document3').'</span>';
        $cell_08_4 = '<span style="font-size:11px;">'.$this->input->post('document4').'</span>';
        $cell_08_5 = '<span style="font-size:11px;">'.$this->input->post('document5').'</span>';
        $cell_08_6 = '<span style="font-size:11px;">'.$this->input->post('document6').'</span>';
        $cell_remarks1 = '<span style="font-size:11px;">'.$this->input->post('remarks1').'</span>';
        $cell_remarks2 = '<span style="font-size:11px;">'.$this->input->post('remarks2').'</span>';
        $cell_remarks3 = '<span style="font-size:11px;">'.$this->input->post('remarks3').'</span>';
        $cell_remarks4 = '<span style="font-size:11px;">'.$this->input->post('remarks4').'</span>';
        $cell_remarks5 = '<span style="font-size:11px;">'.$this->input->post('remarks5').'</span>';
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
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_1, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_2, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_3, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_4, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_5, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_6, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_remarks1, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_remarks2, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_remarks3, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_remarks4, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_remarks5, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_09, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true);
        $this->pdf->Image($cell_10, '95', '40', 30, '', '', '', '', false, '300');
        $this->pdf->Image($cell_11, '', '', 50, '', '', '', '', false, '300', 'R');
        //  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
        $this->pdf->Output("sample.pdf", "I");
    }

    /*
     * FAX送付状 印刷画面
     */
    function printing_conform2() {
        
        $this->load->library('pdf');
        
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
        
        $cell_01_1 = '<span style="font-size:35px;">FAX送付状</span><span style="font-size:10px;">（送付状含み1枚）</span>';
        $cell_01_2 = '<span style="font-size:10px;">'. mdate('%Y年%m月%d日'). '</span>';
        $cell_02 = '<span style="font-size:14px;">'.$this->session->userdata('corp_name').'</span><br><span style="font-size:14px;">'.$this->session->userdata('contract_name').' 様</span><br><br><br><br><br><br><span style="font-size:13px;">FAX番号：'.$this->session->userdata('fax').'</span>';
        $cell_03 = '<span style="font-size:13px;">ライフコンシェルジュ株式会社<br>担当：'.$this->session->userdata('user_name').'<br></span><span style="font-size:11px;">〒151-0053<br>東京都渋谷区代々木2-14-5　F2ビル6階<br>TEL：03-5309-2503　FAX：03-6800-2509<br>Mail：'.$this->session->userdata('user_mail_address').'</span>';
        $cell_04 = '<span style="font-size:13px;">'.$this->input->post('title').'</span>';
        $cell_05 = '<span style="font-size:12px;">備考：□至急　□重要　□要返答</span>';
        $cell_08 = '<span style="font-size:11px;">＜送付書類明細＞</span>';
        $cell_08_1 = '<span style="font-size:11px;">'.$this->input->post('document1').'</span>';
        $cell_08_2 = '<span style="font-size:11px;">'.$this->input->post('document2').'</span>';
        $cell_08_3 = '<span style="font-size:11px;">'.$this->input->post('document3').'</span>';
        $cell_08_4 = '<span style="font-size:11px;">'.$this->input->post('document4').'</span>';
        $cell_08_5 = '<span style="font-size:11px;">'.$this->input->post('document5').'</span>';
        $cell_08_6 = '<span style="font-size:11px;">'.$this->input->post('document6').'</span>';
        $cell_remarks = '<span style="font-size:12px;">お世話になります。</span><br><br>'
                .'<span style="font-size:12px;">私、ほけん設計　ライフコンシェルジュ株式会社の建（たて）と申します。<br>宜しくお願い致します</span><br><br><br>'
                .'<span style="font-size:12px;">'.$this->input->post('remarks1')
                .'</span><br><span style="font-size:12px;">'.$this->input->post('remarks2')
                .'</span><br><span style="font-size:12px;">'.$this->input->post('remarks3')
                .'</span><br><span style="font-size:12px;">'.$this->input->post('remarks4')
                .'</span><br><span style="font-size:12px;">'.$this->input->post('remarks5')
                .'</span><br><span style="font-size:12px;">'.$this->input->post('remarks6').'</span>';
        $cell_10 = base_url() .'uploads/logo2.jpg';
        $cell_11 = base_url() .'uploads/logo.jpg';

        $this->pdf->writeHTMLCell( 120, 16, '', '', $cell_01_1, 1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 70, 16, '', '', $cell_01_2, 1, 1, false, true, 'R');
        $this->pdf->writeHTMLCell( 80, 45, '', '', $cell_02, 1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 40, 45, '', '', '', 1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 70, 45, '', '', $cell_03, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 10, '', '', $cell_04, 1, 1, false, true, 'C');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_05, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_1, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_2, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_3, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_4, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_5, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_08_6, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 105, '', '', $cell_remarks, 1, 1, false, true, 'L');
        $this->pdf->Image($cell_10, '95', '28', 30, '', '', '', '', false, '300');
        $this->pdf->Image($cell_11, '', '250', 50, '', '', '', '', false, '300', 'R');
        //  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
        $this->pdf->Output("sample.pdf", "I");
    }

    /*
     * 傷害事故受付シート 印刷画面
     */
    function printing_conform4() {
        
        $this->load->library('pdf');

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
        
        $param_01 = '<span style="font-size:10px;">平成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>';
        $param_02 = '<span style="font-size:16px;">傷害事故受付シート</span>';
        $param_03 = '<span style="font-size:15px;">FAX番号：'.$this->session->userdata('fax').'</span>';
        $param_04 = '<br><U><span style="font-size:12px;">貴社名'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span></U><br><br><U><span style="font-size:12px;">ご担当者様'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span></U><br><br><U><span style="font-size:12px;">ご連絡先'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</U></span>';
        $param_05 = '<span style="font-size:10px;">総合保険代理店&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ほけん設計株式会社<br>担当：'.$this->session->userdata('user_name')
                .'<br></span><span style="font-size:10px;">〒151-0053<br>東京都渋谷区代々木2-14-5　F2ビル6階<br>TEL：03-5309-2503　FAX：03-6800-2509<br>Mail：'
                .$this->session->userdata('user_mail_address').'</span>';
        $param_06 = '<span style="font-size:10px;">いつもお世話になっております。さっそくですが、お怪我の件につきまして取り急ぎ下記の事項をご記入の上、ＦＡＸにてこのままご返送頂きます様お願い申しあげます。円滑な保険金の支払いの為にも、お早めにご返送下さいます様、ご協力願います。</span>';
        $param_07_1 = '<span style="font-size:10px;">事故日時</span>';
        $param_07_2 = '<span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'午前・午後&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;時ころ</span>';
        $param_08 = '<span style="font-size:10px;">事故場所（住所）</span>';
        $param_09 = '<span style="font-size:10px;">事故の状況</span>';
        $param_10_1 = '<span style="font-size:10px;">事故にあわれた方</span>';
        $param_10_2 = '<span style="font-size:10px;">住所&nbsp;&nbsp;〒</span><br><br>'
                .'<span style="font-size:10px;">氏名</span><br>'
                .'<span style="font-size:10px;">日中連絡先番号</span><br>'.
                '<span style="font-size:10px;">生年月日'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'年齢&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歳</span>';
        $param_11_1 = '<span style="font-size:10px;">入院の有無</span>';
        $param_11_2 = '<span style="font-size:10px;">なし　・　あり　⇒　ありの場合</span>'
                .'<U><span style="font-size:10px;">見込み&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日間</span></U><span style="font-size:10px;">くらい</span>';
        $param_12_1 = '<span style="font-size:10px;">手術の有無</span>';
        $param_12_2 = '<span style="font-size:10px;">なし　・　あり　⇒　手術内容</span>'
                .'<U><span style="font-size:10px;">'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span></U>';
        $param_13_1 = '<span style="font-size:10px;">病院の初診日</span>';
        $param_13_2 = '<span style="font-size:10px;">'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'年'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'月'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'日</span>';
        $param_14_1 = '<span style="font-size:10px;">治療費負担</span>';
        $param_14_2 = '<span style="font-size:10px;">健保または国保　・　労災　・　その他（'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'）</span>';
        $param_15_1 = '<span style="font-size:10px;">医療機関名</span>';
        $param_15_2 = '<span style="font-size:10px;">住所&nbsp;&nbsp;〒</span><br>'
                .'<span style="font-size:10px;">病院名'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span>/'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'<span style="font-size:10px;">科</span>';
        $param_16_1 = '<span style="font-size:10px;">治療期間</span>';
        $param_16_2 = '<span style="font-size:10px;">見込み期間&nbsp;&nbsp;&nbsp;約</span>'
                .'<U><span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日くらい</span></U>';
        $param_17_1 = '<span style="font-size:10px;">ケガの場所</span><br><span style="font-size:10px;">ケガの内容</span>';
        $param_17_2 = '<span style="font-size:10px;">頭・顔・首・背中・腰・腕（左、右）・手（左、右）・その他（&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;）</span>'
                .'<br><span style="font-size:10px;">打撲・切断・捻挫・骨折・'
                .'その他（&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;）</span>';
        $param_18 = '<span style="font-size:10px;">【ご注意事項】</span>';
        $param_19 = '<span style="font-size:10px;">針鍼灸院は医師免許のない治療施設のため、保険金が支払われない可能性がありますので、事前に必ずご連絡頂きます様お願い申しあげます。</span>';
        $param_20 = '<span style="font-size:12px;">保険金請求に際しましては、AIU指定の診断書が必要となります。</span>';
        $param_21 = '<span style="font-size:10px;">こちらの受付シートをいただきましてから郵送させていただきます。</span>';
        
        $cell_10 = base_url() .'uploads/logo2.jpg';

        $this->pdf->writeHTML($param_01, true, 0, true, false, 'R');
        $this->pdf->writeHTML($param_02, true, 0, true, false, 'C');
        $this->pdf->writeHTML($param_03, true, 0, true, false, 'C');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true);
        $this->pdf->writeHTMLCell( 120, 35, '', '', $param_04, 0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 70, 35, '', '', $param_05, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $param_06, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_07_1, 1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_07_2, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 14, '', '', $param_08,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 14, '', '', '',1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 22, '', '', $param_09,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 22, '', '', '',1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 23, '', '', $param_10_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 23, '', '', $param_10_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_11_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_11_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_12_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_12_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_13_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_13_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_14_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_14_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 10, '', '', $param_15_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 10, '', '', $param_15_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_16_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_16_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 10, '', '', $param_17_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 10, '', '', $param_17_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 6, '', '', $param_18, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 8, 6, '', '', '1',0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 182, 6, '', '', $param_19,0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 8, 6, '', '', '2',0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 182, 6, '', '', $param_20,0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 8, 6, '', '', '',0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 182, 6, '', '', $param_21,0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 190, 12, '', '', 'メモ',1, 0, false, true, 'L');
        
        $this->pdf->Image($cell_10, '109', '35', 19, '', '', '', '', false, '300');
        //  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
        $this->pdf->Output("sample.pdf", "I");
    }

    /*
     * 傷害事故受付シート 印刷画面
     */
    function printing_conform5() {
        
        $this->load->library('pdf');
        
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
        
        $param_01 = '<span style="font-size:10px;">平成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;日</span>';
        $param_02 = '<span style="font-size:16px;">賠償事故受付シート</span>';
        $param_03 = '<span style="font-size:15px;">FAX番号：'.$this->session->userdata('fax').'</span>';
        $param_04 = '<br><U><span style="font-size:12px;">貴社名'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span></U><br><br><U><span style="font-size:12px;">ご担当者様'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</span></U><br><br><U><span style="font-size:12px;">ご連絡先'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .'</U></span>';
        $param_05 = '<span style="font-size:10px;">総合保険代理店&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ほけん設計株式会社<br>担当：'.$this->session->userdata('user_name')
                .'<br></span><span style="font-size:10px;">〒151-0053<br>東京都渋谷区代々木2-14-5　F2ビル6階<br>TEL：03-5309-2503　FAX：03-6800-2509<br>Mail：'
                .$this->session->userdata('user_mail_address').'</span>';
        $param_06 = '<span style="font-size:10px;">いつもお世話になっております。さっそくですが、ご報告頂きました賠償事故の件につきまして下記の事項をご記入の上、ＦＡＸにてご返送頂きます様お願い申しあげます。お手数おかけ致しますが、宜しくお願い申し上げます。</span>';
        $param_07_1 = '<span style="font-size:10px;">事故の原因となった作業日</span>';
        $param_07_2 = '<span style="font-size:10px;">年&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;</span>';
        $param_08_1 = '<span style="font-size:10px;">損害発見日　時間</span>';
        $param_08_2 = '<span style="font-size:10px;">年&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;午前・午後&nbsp;&nbsp;&nbsp;&nbsp;時ころ</span>';
        $param_09 = '<span style="font-size:10px;">事故発生場所（住所）</span>';
        $param_10 = '<span style="font-size:9px;">事故内容<br>＊どういう作業をしていて、どのような損害が生じたのかの詳細を記入願います</span>';
        $param_11_1 = '<span style="font-size:10px;">損害の出た物<br>（品名、修理金額等）</span>';
        $param_11_2 = '<table><tr><td>品名：</td><td>購入金額：</td></tr><tr><td>所有者：</td><td>修理金額：</td></tr><tr><td>購入時期：</td><td>製品型番：</td></tr></table>';
        $param_12_1 = '<span style="font-size:10px;">被害者の要望</span>';
        $param_13_1 = '<span style="font-size:10px;">補修業者<br>(○をつけて下さい)</span><br><span style="font-size:9px;">※車の損害の場合は併せて入庫日もご確認願います</span>';
        $param_13_2 = '<table><tr><td colspan="2"><p style="text-align: center;">他業者にて手配</p></td></tr><tr><td>業者名</td><td></td></tr><tr><td>連絡先</td><td></td></tr><tr><td>担当者名</td><td></td></tr></table>';
        $param_14_1 = '<span style="font-size:10px;">相手連絡先</span>';
        $param_14_2 = '<span style="font-size:10px;">住所</span><br><span style="font-size:10px;">氏名</span><br><span style="font-size:10px;">電話番号</span><br><span style="font-size:10px;">携帯番号</span>';
        $param_15_1 = '<span style="font-size:10px;">御社事故担当者</span>';
        $param_15_2 = '<table><tr><td>支店名</td><td>氏名</td></tr><tr><td>連絡先　TEL</td><td>FAX</td></tr></table>';
        $param_16 = '<span style="font-size:9px;">※当報告書のご提出を頂かない場合、事故処理が遅れることがございますので早急に手配いただきますよう、お願いいたします。</span>';
        $param_17 = '<span style="font-size:10px;">＜取り急ぎご手配頂くもの＞</span><span style="font-size:8px;">ご不明点はお問い合わせください</span>';
        $param_18 = '<span style="font-size:10px;">必ず損害状況の確認できる写真を撮っておいていただきますようお願い申し上げます（なるべく多めに）<br>①損害箇所のアップ　　②損害物全体　　③事故現場全体の写真が必要となります</span>';
        $param_19 = '<span style="font-size:10px;">この用紙とともに、工事受注注文書(請書)コピーをＦＡＸ頂きます様お願い申し上げます</span>';
        
        $cell_10 = base_url() .'uploads/logo2.jpg';

        $this->pdf->writeHTML($param_01, true, 0, true, false, 'R');
        $this->pdf->writeHTML($param_02, true, 0, true, false, 'C');
        $this->pdf->writeHTML($param_03, true, 0, true, false, 'C');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true);
        $this->pdf->writeHTMLCell( 120, 35, '', '', $param_04, 0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 70, 35, '', '', $param_05, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 6, '', '', $param_06, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_07_1, 1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_07_2, 1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 6, '', '', $param_08_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 6, '', '', $param_08_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 14, '', '', $param_09,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 14, '', '', '',1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 20, '', '', $param_10,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 20, '', '', '',1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 14, '', '', $param_11_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 14, '', '', $param_11_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 14, '', '', $param_12_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 14, '', '', '',1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 19, '', '', $param_13_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 19, '', '', $param_13_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 19, '', '', $param_14_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 19, '', '', $param_14_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 50, 10, '', '', $param_15_1,1, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 140, 10, '', '', $param_15_2,1, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 6, '', '', $param_16, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true);
        $this->pdf->writeHTMLCell( 0, 6, '', '', $param_17, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 8, 6, '', '', '1',0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 182, 6, '', '', $param_18, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 8, 6, '', '', '2',0, 0, false, true, 'L');
        $this->pdf->writeHTMLCell( 182, 6, '', '', $param_19,0, 1, false, true, 'L');
        
        $this->pdf->Image($cell_10, '109', '35', 19, '', '', '', '', false, '300');
        //  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
        $this->pdf->Output("sample.pdf", "I");
    }
    
    /*
     * 大判 印刷画面
     */
    function printing_conform3() {
        
        $this->load->library('pdf');
        $this->pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true);
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
        
        $cell_01 = '<span style="font-size:25px;">〒'.$this->session->userdata('post').'</span>'
                .'<br><span style="font-size:25px;">&nbsp;&nbsp;&nbsp;&nbsp;'.$this->session->userdata('address').'</span>';
        $cell_02 = '<table><tr><td colspan="2"><p style="font-size:25px; text-align: center;">'.$this->session->userdata('corp_name').'&nbsp;&nbsp;&nbsp;&nbsp;御中</p></td></tr>'
                .'<tr><td></td><td></td></tr>'
                .'<tr><td></td><td></td></tr>'
                .'<tr><td></td><td></td></tr>'
                .'<tr><td></td><td></td></tr>'
                .'<tr><td></td><td><span style="font-size:20px;">'.$this->session->userdata('contract_name').' 様</span></td></tr></table>';

        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_01, 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', '', 0, 1, false, true, 'L');
        $this->pdf->writeHTMLCell( 0, 7, '', '', $cell_02, 0, 1, false, true, 'C');
        //  $this->pdf->writeHTML($tbl, true, false, false, false, 'C');
        $this->pdf->Output("sample.pdf", "I");
    }
}
?>

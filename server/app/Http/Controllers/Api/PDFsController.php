<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use setasign\Fpdi;

use App\Document;
use App\Annotation;

class PDFsController extends Controller
{
    public function export($id)
    {
        $document = Document::find($id);
        if (!$document) {
            // return response(null, 404);
        }

        $annotations = Annotation::where('doc_id', $id)->orderBy('z_order', 'asc')->get();

        $pdf = new Fpdi\TcpdfFpdi();
        $pdf->setPrintHeader(false);
        // $pdf = new \setasign\Fpdi\Fpdi();

        $pageCount = $pdf->setSourceFile('source.pdf');

        foreach (range(1, $pageCount) as $i) {
            $pdf->AddPage();

            $page = $i;
            $tplId = $pdf->importPage($page);
            $size = $pdf->getTemplateSize($tplId);
            $pdf->useTemplate($tplId, 0, 0, $size['width'], $size['height'], true);
            
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf->setJPEGQuality(75);

            foreach ($annotations as $annotation) {
                if (intval($annotation->page_num) == $page) {
                    $font_weight = $annotation->font_weight;
                    if ($font_weight == 'N') {
                        $font_weight = '';
                    }
                    $pdf->SetFont($annotation->font_family, $font_weight, $annotation->font_size);
                    $hexColor = $annotation->font_color;
                    list($r, $g, $b) = sscanf($hexColor, '%02x%02x%02x');
                    $pdf->SetTextColor($r, $g, $b);
                    $pdf->SetXY(intval($annotation->pos_x), intval($annotation->pos_y));
                    switch ($annotation->type) {
                    case 'text':
                        $pdf->Write($page, $annotation->text);
                        break;
                    case 'checkbox':
                        $pdf->CheckBox($annotation->annotation_id, 5, true, array(), array(), 'OK');
                        break;
                    case 'radiobutton':
                        $pdf->RadioButton('radio', 5, array(), array(), 'OK');
                        break;
                    case 'image':
                        $pdf->Image(public_path().'/i001.jpg', '', '', intval($annotation->size_w), intval($annotation->size_h), '', '',
                            'T', false, 300, '', false, false, 1, false, false, false
                        );
                        break;
                    }
                }
            }
        }


        $pdf->Output(public_path().'/result.pdf', 'F');

        return $pageCount;
    }
}

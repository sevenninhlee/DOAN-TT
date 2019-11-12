<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\Document;
use App\SignRequest;

class DocumentsController extends Controller
{
    private $document_ext = ['pdf'];

    public function getDocuments(Request $request)
    {
        $documents = Document::get();

        return response()->json([
            'documents' => $documents
        ], 200);
    }

    public function getDocument(Request $request, $id)
    {
        $document = Document::find($id);
        if ($document == null) {
            return response(null, 404);
        }

        return response()->json([
            'document' => $document
        ], 200);
    }

    public function uploadDocument(Request $request)
    {
        $file = $request->file('file');
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $draft_filename = $name. time(). '.'. $ext;

        Storage::putFileAs('uploads/documents', $file, $draft_filename);

        $document = new Document([
            'document_id' => str_random(20),
            'document_name' => $name. '.'. $ext,
            'document_file' => 'uploads/documents/'. $draft_filename,
            'creator_id' => $request->user()->id,
            'doc_folder_id' => $request->doc_folder_id,
            'action' => 'sign',
            'status' => 'draft',
        ]);

        $document->save();

        return response()->json([
            'message' => 'Document has been uploaded.'
        ], 201);
    }

    public function deleteDocument(Request $request, $id)
    {
        $document = Document::find($id);
        if ($document == null) {
            return response(null, 404);
        }

        $document->delete();

        return response(null, 200);
    }

    public function documentSetting(Request $request, $id)
    {
        $document = Document::find($id);
        if ($document == null) {
            return response(null, 404);
        }

        if ($request->doc_folder_id) {
            $document->doc_folder_id = $request->doc_folder_id;
        }

        if ($request->expiration_days) {
            $document->expiration_days = $request->expiration_days;
        }

        if ($request->action) {
            $document->action = $request->action;
        } else {
            $document->action = 'sign';
        }

        if ($request->comment) {
            $document->comment = $request->comment;
        }

        if ($request->password) {
            $document->password = bcrypt($request->password);
        }

        $document->save();

        return response(null, 200);
    }

    public function getSignRequests(Request $request, $doc_id)
    {
        $srs = SignRequest::where('document_id', $doc_id)->get();
        if ($srs == null) {
            return response(null, 404);
        }

        return response()->json([
            'sign_requests' => $srs
        ], 200);
    }

    public function addSignRequest(Request $request, $doc_id)
    {
        $validator = Validator::make($request->all(), [
            'signer_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $sr = new SignRequest([
            'document_id' => $doc_id,
            'signer_id' => $request->signer_id,
            'comment' => $request->comment
        ]);
        if ($request->request_type) {
            $sr->request_type = $request->request_type;
        } else {
            $sr->request_type = 'sign';
        }

        if ($request->expiration_days) {
            $sr->expiration_days = $request->expiration_days;
        } else {
            $sr->expiration_days = 14;
        }

        if ($request->password) {
            $sr->password = bcrypt($request->password);
        }

        $sr->save();

        return response()->json(null, 201);
    }

    public function editSignRequest(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'document_id' => 'required',
            'signer_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $sr = SignRequest::find($id);
        if ($request->request_type) {
            $sr->request_type = $request->request_type;
        } else {
            $sr->request_type = 'sign';
        }

        if ($request->expiration_days) {
            $sr->expiration_days = $request->expiration_days;
        } else {
            $sr->expiration_days = 14;
        }

        if ($request->password) {
            $sr->password = bcrypt($request->password);
        }

        $sr->save();

        return response()->json(null, 200);
    }

    public function deleteSignRequest($id)
    {
        $sr = SignRequest::find($id);
        if ($sr == null) {
            return response(null, 404);
        }

        $sr->delete();

        return response(null, 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService)
    {
    }
    public function addContact(Agence $agence)
    {
        $userId = auth()->user()->id;
        $status = $this->contactService->registerContact($userId, $agence->id);
        return response()->json($status);
    }
    public function getContactForUser()
    {
        $userId = auth()->user()->id;
        $contacts = $this->contactService->getContactForUser($userId);

        return response()->json($contacts);
    }

    public function getContactForAgence(Agence $agence)
    {
        $contacts = $this->contactService->getContactForAgence($agence->id);
        return response()->json($contacts);
    }

    public function removeContact(Agence $agence)
    {
        $userId = auth()->user()->id;

        $status = $this->contactService->removeContact($agence->id, $userId);
        return response()->json($status);
    }
}

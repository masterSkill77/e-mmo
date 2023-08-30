<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    public function registerContact(int $user_id, int $agenceId)
    {
        $contact = new Contact([
            'user_id' => $user_id,
            'contact_id' => $agenceId
        ]);
        $contact->save();
        return $contact;
    }

    public function getContactForUser(int $userId): Collection
    {
        return Contact::where("user_id", $userId)->with('agence')->get();
    }
    public function getContactForAgence(int $agenceId): Collection
    {
        return Contact::where("contact_id", $agenceId)->with('user')->get();
    }
    public function removeContact(int $agenceId, int $userId): bool
    {
        return Contact::where("contact_id", $agenceId)->where("user_id", $userId)->delete();
    }
}

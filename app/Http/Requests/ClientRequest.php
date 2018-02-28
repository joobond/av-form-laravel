<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Validando os campos do meu formulário
        $client_type = Client::getClientType($this->client_type);
        $documentNumberType = $client_type == Client::TYPE_INDIVIDUAL?'cpf':'cnpj';
        $client = $this->route('client');
        $client_id = $client instanceof Client?$client->id:null;
        $rules=[
            'name' => 'required|max:255',
            'document_number' => "required|unique:clients,document_number,$client_id|document_number:$documentNumberType",
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $marital_status= implode(',',array_keys(Client::MARITAL_STATUS));
        $rulesIndividual = [
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$marital_status",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255',
        ];
        $rulesLegal = [
            'company_name' =>'required|max:255',
        ];

        return $client_type == Client::TYPE_INDIVIDUAL ? $rules+$rulesIndividual:$rules+$rulesLegal;
    }
}

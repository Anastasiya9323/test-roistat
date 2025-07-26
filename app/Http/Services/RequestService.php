<?php
namespace App\Http\Services;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Client\LongLivedAccessToken;
use AmoCRM\Collections\ContactsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Models\ContactModel;
use AmoCRM\Models\CustomFieldsValues\CheckboxCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\MultitextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\CheckboxCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\MultitextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\CheckboxCustomFieldValueModel;
use AmoCRM\Models\CustomFieldsValues\ValueModels\MultitextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;
use Illuminate\Http\Request;

class RequestService
{

    public function __construct(
        private Request $request,
    ) {
    }
    public function sendRequest()
    {
        $data = [];

        $timeSpent            = $this->request->input('time_spent');
        $data['timeSpentTag'] = intval($timeSpent) > 30;
        $data['name']         = $this->request->input('name');
        $data['email']        = $this->request->input('email');
        $data['phone']        = $this->request->input('phone');
        $data['price']        = $this->request->input('price');

        $apiClient = $this->createConnection();

        try {
            $result = $this->createLead($apiClient, $data);
        } catch (AmoCRMApiException $e) {
            $result = ' ';
        }

        return $result;
    }

    public function createLead($apiClient, $data)
    {
        $lead = (new LeadModel())
            ->setPrice($data['price'])
            ->setContacts(
                (new ContactsCollection())
                    ->add(
                        (new ContactModel())
                            ->setFirstName($data['name'])
                            ->setCustomFieldsValues(
                                (new CustomFieldsValuesCollection())
                                    ->add(
                                        (new MultitextCustomFieldValuesModel())
                                            ->setFieldCode('PHONE')
                                            ->setValues(
                                                (new MultitextCustomFieldValueCollection())
                                                    ->add(
                                                        (new MultitextCustomFieldValueModel())
                                                            ->setValue($data['phone'])
                                                    )
                                            )
                                    )
                                    ->add(
                                        (new MultitextCustomFieldValuesModel())
                                            ->setFieldCode('EMAIL')
                                            ->setValues(
                                                (new MultitextCustomFieldValueCollection())
                                                    ->add(
                                                        (new MultitextCustomFieldValueModel())
                                                            ->setValue($data['email'])
                                                    )
                                            )
                                    )
                                    ->add(
                                        (new CheckboxCustomFieldValuesModel())
                                            ->setFieldId(744607)
                                            ->setValues(
                                                (new CheckboxCustomFieldValueCollection())
                                                    ->add(
                                                        (new CheckboxCustomFieldValueModel())
                                                            ->setValue($data['timeSpentTag'])
                                                    )
                                            )
                                    )
                            )
                    )
            );

        return $apiClient->leads()->addOneComplex($lead);
    }

    public function createConnection()
    {
        $accessToken = config('auth.access_token');

        $apiClient = new AmoCRMApiClient();

        $longLivedAccessToken = new LongLivedAccessToken($accessToken);

        $apiClient->setAccessToken($longLivedAccessToken)
            ->setAccountBaseDomain(config('auth.base_domain'));

        return $apiClient;
    }
}

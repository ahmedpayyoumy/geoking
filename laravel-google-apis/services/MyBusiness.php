<?php

use Google\Client;
use Google\Service;
use Google\Service\Resource;
use Google\Collection;
use Google\Model;
use GuzzleHttp\Psr7\Request;

class Google_Service_MyBusiness extends Service
{
    public $accounts;
    public $accounts_admins;
    public $accounts_invitations;
    public $accounts_locations;
    public $accounts_locations_admins;
    public $accounts_locations_followers;
    public $accounts_locations_localPosts;
    public $accounts_locations_media;
    public $accounts_locations_media_customers;
    public $accounts_locations_questions;
    public $accounts_locations_questions_answers;
    public $accounts_locations_reviews;
    public $accounts_locations_verifications;
    public $attributes;
    public $categories;
    public $chains;
    public $googleLocations;

    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->rootUrl = 'https://mybusiness.googleapis.com/';
        $this->servicePath = '';
        $this->batchPath = 'batch';
        $this->version = 'v4';
        $this->serviceName = 'mybusiness';

        $this->accounts = new Google_Service_MyBusiness_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/accounts',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'primaryOwner' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'deleteNotifications' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'generateAccountNumber' => array(
                        'path' => 'v4/{+name}:generateAccountNumber',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'getNotifications' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/accounts',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'name' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'filter' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'listRecommendGoogleLocations' => array(
                        'path' => 'v4/{+name}:recommendGoogleLocations',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'update' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PUT',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'validateOnly' => array(
                                'location' => 'query',
                                'type' => 'boolean',
                            ),
                        ),
                    ), 'updateNotifications' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PUT',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_admins = new Google_Service_MyBusiness_AccountsAdmins_Resource(
            $this,
            $this->serviceName,
            'admins',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/{+parent}/admins',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/admins',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_invitations = new Google_Service_MyBusiness_AccountsInvitations_Resource(
            $this,
            $this->serviceName,
            'invitations',
            array(
                'methods' => array(
                    'accept' => array(
                        'path' => 'v4/{+name}:accept',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'decline' => array(
                        'path' => 'v4/{+name}:decline',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/invitations',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'targetType' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations = new Google_Service_MyBusiness_AccountsLocations_Resource(
            $this,
            $this->serviceName,
            'locations',
            array(
                'methods' => array(
                    'associate' => array(
                        'path' => 'v4/{+name}:associate',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'batchGet' => array(
                        'path' => 'v4/{+name}/locations:batchGet',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'batchGetReviews' => array(
                        'path' => 'v4/{+name}/locations:batchGetReviews',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'clearAssociation' => array(
                        'path' => 'v4/{+name}:clearAssociation',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'create' => array(
                        'path' => 'v4/{+parent}/locations',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'validateOnly' => array(
                                'location' => 'query',
                                'type' => 'boolean',
                            ),
                            'requestId' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'fetchVerificationOptions' => array(
                        'path' => 'v4/{+name}:fetchVerificationOptions',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'findMatches' => array(
                        'path' => 'v4/{+name}:findMatches',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'getFoodMenus' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'readMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'getGoogleUpdated' => array(
                        'path' => 'v4/{+name}:googleUpdated',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'getServiceList' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/locations',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'filter' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'languageCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'orderBy' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'updateMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'validateOnly' => array(
                                'location' => 'query',
                                'type' => 'boolean',
                            ),
                            'attributeMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'reportInsights' => array(
                        'path' => 'v4/{+name}/locations:reportInsights',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'transfer' => array(
                        'path' => 'v4/{+name}:transfer',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'updateFoodMenus' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'updateMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'updateServiceList' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'updateMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'verify' => array(
                        'path' => 'v4/{+name}:verify',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_admins = new Google_Service_MyBusiness_AccountsLocationsAdmins_Resource(
            $this,
            $this->serviceName,
            'admins',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/{+parent}/admins',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/admins',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_followers = new Google_Service_MyBusiness_AccountsLocationsFollowers_Resource(
            $this,
            $this->serviceName,
            'followers',
            array(
                'methods' => array(
                    'getMetadata' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_localPosts = new Google_Service_MyBusiness_AccountsLocationsLocalPosts_Resource(
            $this,
            $this->serviceName,
            'localPosts',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/{+parent}/localPosts',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/localPosts',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'updateMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'reportInsights' => array(
                        'path' => 'v4/{+name}/localPosts:reportInsights',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_media = new Google_Service_MyBusiness_AccountsLocationsMedia_Resource(
            $this,
            $this->serviceName,
            'media',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/{+parent}/media',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/media',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'updateMask' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'startUpload' => array(
                        'path' => 'v4/{+parent}/media:startUpload',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_media_customers = new Google_Service_MyBusiness_AccountsLocationsMediaCustomers_Resource(
            $this,
            $this->serviceName,
            'customers',
            array(
                'methods' => array(
                    'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/media/customers',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_questions = new Google_Service_MyBusiness_AccountsLocationsQuestions_Resource(
            $this,
            $this->serviceName,
            'questions',
            array(
                'methods' => array(
                    'create' => array(
                        'path' => 'v4/{+parent}/questions',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'delete' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/questions',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'answersPerQuestion' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'filter' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'orderBy' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'patch' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'PATCH',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_questions_answers = new Google_Service_MyBusiness_AccountsLocationsQuestionsAnswers_Resource(
            $this,
            $this->serviceName,
            'answers',
            array(
                'methods' => array(
                    'delete' => array(
                        'path' => 'v4/{+parent}/answers:delete',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/answers',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'orderBy' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'upsert' => array(
                        'path' => 'v4/{+parent}/answers:upsert',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_reviews = new Google_Service_MyBusiness_AccountsLocationsReviews_Resource(
            $this,
            $this->serviceName,
            'reviews',
            array(
                'methods' => array(
                    'deleteReply' => array(
                        'path' => 'v4/{+name}/reply',
                        'httpMethod' => 'DELETE',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/reviews',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'orderBy' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'updateReply' => array(
                        'path' => 'v4/{+name}/reply',
                        'httpMethod' => 'PUT',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ),
                )
            )
        );
        $this->accounts_locations_verifications = new Google_Service_MyBusiness_AccountsLocationsVerifications_Resource(
            $this,
            $this->serviceName,
            'verifications',
            array(
                'methods' => array(
                    'complete' => array(
                        'path' => 'v4/{+name}:complete',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/{+parent}/verifications',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'parent' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->attributes = new Google_Service_MyBusiness_Attributes_Resource(
            $this,
            $this->serviceName,
            'attributes',
            array(
                'methods' => array(
                    'list' => array(
                        'path' => 'v4/attributes',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'categoryId' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'country' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'languageCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->categories = new Google_Service_MyBusiness_Categories_Resource(
            $this,
            $this->serviceName,
            'categories',
            array(
                'methods' => array(
                    'batchGet' => array(
                        'path' => 'v4/categories:batchGet',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'languageCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'categoryIds' => array(
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ),
                            'regionCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'view' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ), 'list' => array(
                        'path' => 'v4/categories',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'regionCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'languageCode' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'searchTerm' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'pageSize' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                            'pageToken' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'view' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->chains = new Google_Service_MyBusiness_Chains_Resource(
            $this,
            $this->serviceName,
            'chains',
            array(
                'methods' => array(
                    'get' => array(
                        'path' => 'v4/{+name}',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'search' => array(
                        'path' => 'v4/chains:search',
                        'httpMethod' => 'GET',
                        'parameters' => array(
                            'chainDisplayName' => array(
                                'location' => 'query',
                                'type' => 'string',
                            ),
                            'resultCount' => array(
                                'location' => 'query',
                                'type' => 'integer',
                            ),
                        ),
                    ),
                )
            )
        );
        $this->googleLocations = new Google_Service_MyBusiness_GoogleLocations_Resource(
            $this,
            $this->serviceName,
            'googleLocations',
            array(
                'methods' => array(
                    'report' => array(
                        'path' => 'v4/{+name}:report',
                        'httpMethod' => 'POST',
                        'parameters' => array(
                            'name' => array(
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ),
                        ),
                    ), 'search' => array(
                        'path' => 'v4/googleLocations:search',
                        'httpMethod' => 'POST',
                        'parameters' => array(),
                    ),
                )
            )
        );
    }
}

class Google_Service_MyBusiness_Accounts_Resource extends Resource
{
    /**
     * @param Google_Service_MyBusiness_Account|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($postBody, $optParams = array())
    {
        $params = array('postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_Account");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function deleteNotifications($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('deleteNotifications', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_GenerateAccountNumberRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function generateAccountNumber($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('generateAccountNumber', array($params), "Google_Service_MyBusiness_Account");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_Account");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function getNotifications($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('getNotifications', array($params), "Google_Service_MyBusiness_Notifications");
    }

    /**
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccounts($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListAccountsResponse");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listRecommendGoogleLocations($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('listRecommendGoogleLocations', array($params), "Google_Service_MyBusiness_ListRecommendedGoogleLocationsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_Account|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function update($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('update', array($params), "Google_Service_MyBusiness_Account");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_Notifications|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function updateNotifications($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('updateNotifications', array($params), "Google_Service_MyBusiness_Notifications");
    }
}

class Google_Service_MyBusiness_AccountsAdmins_Resource extends Resource
{
    /**
     * @param $parent
     * @param Google_Service_MyBusiness_Admin|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_Admin");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsAdmins($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListAccountAdminsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_Admin|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_Admin");
    }
}

class Google_Service_MyBusiness_AccountsInvitations_Resource extends Resource
{
    /**
     * @param $name
     * @param Google_Service_MyBusiness_AcceptInvitationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function accept($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('accept', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_DeclineInvitationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function decline($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('decline', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsInvitations($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListInvitationsResponse");
    }
}

class Google_Service_MyBusiness_AccountsLocations_Resource extends Resource
{
    /**
     * @param $name
     * @param Google_Service_MyBusiness_AssociateLocationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function associate($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('associate', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param Google_Service_MyBusiness_BatchGetLocationsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function batchGet($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('batchGet', array($params), "Google_Service_MyBusiness_BatchGetLocationsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_BatchGetReviewsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function batchGetReviews($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('batchGetReviews', array($params), "Google_Service_MyBusiness_BatchGetReviewsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_ClearLocationAssociationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function clearAssociation($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('clearAssociation', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param Google_Service_Mybusiness_Location|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_Location");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_FetchVerificationOptionsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function fetchVerificationOptions($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('fetchVerificationOptions', array($params), "Google_Service_MyBusiness_FetchVerificationOptionsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_FindMatchingLocationsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function findMatches($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('findMatches', array($params), "Google_Service_MyBusiness_FindMatchingLocationsResponse");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_Location");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function getFoodMenus($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('getFoodMenus', array($params), "Google_Service_MyBusiness_FoodMenus");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function getGoogleUpdated($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('getGoogleUpdated', array($params), "Google_Service_MyBusiness_GoogleUpdatedLocation");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function getServiceList($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('getServiceList', array($params), "Google_Service_MyBusiness_ServiceList");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocations($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocationsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_Location|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_Location");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_ReportLocationInsightsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function reportInsights($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('reportInsights', array($params), "Google_Service_MyBusiness_ReportLocationInsightsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_TransferLocationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function transfer($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('transfer', array($params), "Google_Service_MyBusiness_Location");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_FoodMenus|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function updateFoodMenus($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('updateFoodMenus', array($params), "Google_Service_MyBusiness_FoodMenus");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_ServiceList|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function updateServiceList($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('updateServiceList', array($params), "Google_Service_MyBusiness_ServiceList");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_VerifyLocationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function verify($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('verify', array($params), "Google_Service_MyBusiness_VerifyLocationResponse");
    }
}

class Google_Service_MyBusiness_AccountsLocationsAdmins_Resource extends Resource
{
    /**
     * @param $parent
     * @param Google_Service_Mybusiness_Admin|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_Admin");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsAdmins($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocationAdminsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_Admin|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_Admin");
    }
}

class Google_Service_MyBusiness_AccountsLocationsFollowers_Resource extends Resource
{
    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function getMetadata($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('getMetadata', array($params), "Google_Service_MyBusiness_FollowersMetadata");
    }
}

class Google_Service_MyBusiness_AccountsLocationsLocalPosts_Resource extends Resource
{
    /**
     * @param $parent
     * @param Google_Service_Mybusiness_LocalPost|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_LocalPost");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_LocalPost");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsLocalPosts($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListLocalPostsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_LocalPost|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_LocalPost");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_ReportLocalPostInsightsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function reportInsights($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('reportInsights', array($params), "Google_Service_MyBusiness_ReportLocalPostInsightsResponse");
    }
}

class Google_Service_MyBusiness_AccountsLocationsMedia_Resource extends Resource
{
    /**
     * @param $parent
     * @param Google_Service_Mybusiness_MediaItem|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_MediaItem");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_MediaItem");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsMedia($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListMediaItemsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_MediaItem|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_MediaItem");
    }

    /**
     * @param $parent
     * @param Google_Service_Mybusiness_StartUploadMediaItemDataRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function startUpload($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('startUpload', array($params), "Google_Service_MyBusiness_MediaItemDataRef");
    }
}

class Google_Service_MyBusiness_AccountsLocationsMediaCustomers_Resource extends Resource
{
    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_MediaItem");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsMediaCustomers($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListCustomerMediaItemsResponse");
    }
}

class Google_Service_MyBusiness_AccountsLocationsQuestions_Resource extends Resource
{
    /**
     * @param $parent
     * @param Google_Service_Mybusiness_Question|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function create($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('create', array($params), "Google_Service_MyBusiness_Question");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsQuestions($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListQuestionsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_Question|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function patch($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('patch', array($params), "Google_Service_MyBusiness_Question");
    }
}

class Google_Service_MyBusiness_AccountsLocationsQuestionsAnswers_Resource extends Resource
{
    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function delete($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('delete', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsQuestionsAnswers($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListAnswersResponse");
    }

    /**
     * @param $parent
     * @param Google_Service_Mybusiness_UpsertAnswerRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function upsert($parent, $postBody, $optParams = array())
    {
        $params = array('parent' => $parent, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('upsert', array($params), "Google_Service_MyBusiness_Answer");
    }
}

class Google_Service_MyBusiness_AccountsLocationsReviews_Resource extends Resource
{
    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function deleteReply($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('deleteReply', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_Review");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsReviews($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListReviewsResponse");
    }

    /**
     * @param $name
     * @param Google_Service_Mybusiness_ReviewReply|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function updateReply($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('updateReply', array($params), "Google_Service_MyBusiness_ReviewReply");
    }
}

class Google_Service_MyBusiness_AccountsLocationsVerifications_Resource extends Resource
{
    /**
     * @param $name
     * @param Google_Service_Mybusiness_CompleteVerificationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function complete($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('complete', array($params), "Google_Service_MyBusiness_CompleteVerificationResponse");
    }

    /**
     * @param $parent
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAccountsLocationsVerifications($parent, $optParams = array())
    {
        $params = array('parent' => $parent);
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListVerificationsResponse");
    }
}

class Google_Service_MyBusiness_Attributes_Resource extends Resource
{
    /**
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listAttributes($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListAttributeMetadataResponse");
    }
}

class Google_Service_MyBusiness_Categories_Resource extends Resource
{
    /**
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function batchGet($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('batchGet', array($params), "Google_Service_MyBusiness_BatchGetBusinessCategoriesResponse");
    }

    /**
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function listCategories($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('list', array($params), "Google_Service_MyBusiness_ListBusinessCategoriesResponse");
    }
}

class Google_Service_MyBusiness_Chains_Resource extends Resource
{
    /**
     * @param $name
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function get($name, $optParams = array())
    {
        $params = array('name' => $name);
        $params = array_merge($params, $optParams);
        return $this->call('get', array($params), "Google_Service_MyBusiness_Chain");
    }

    /**
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function search($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('search', array($params), "Google_Service_MyBusiness_SearchChainsResponse");
    }
}

class Google_Service_MyBusiness_GoogleLocations_Resource extends Resource
{
    /**
     * @param $name
     * @param Google_Service_Mybusiness_ReportGoogleLocationRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function report($name, $postBody, $optParams = array())
    {
        $params = array('name' => $name, 'postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('report', array($params), "Google_Service_MyBusiness_MybusinessEmpty");
    }

    /**
     * @param Google_Service_Mybusiness_SearchGoogleLocationsRequest|array $postBody
     * @param array $optParams
     * @return Request
     * @throws \Google\Exception
     */
    public function search($postBody, $optParams = array())
    {
        $params = array('postBody' => $postBody);
        $params = array_merge($params, $optParams);
        return $this->call('search', array($params), "Google_Service_MyBusiness_SearchGoogleLocationsResponse");
    }
}


class Google_Service_MyBusiness_AcceptInvitationRequest extends Model
{
}

class Google_Service_MyBusiness_Account extends Model
{
    protected $internal_gapi_mappings = array();
    public $accountName;
    public $accountNumber;
    public $name;
    protected $organizationInfoType = 'Google_Service_MyBusiness_OrganizationInfo';
    protected $organizationInfoDataType = '';
    public $permissionLevel;
    public $role;
    protected $stateType = 'Google_Service_MyBusiness_AccountState';
    protected $stateDataType = '';
    public $type;


    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

    public function getAccountName()
    {
        return $this->accountName;
    }

    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOrganizationInfo(Google_Service_MyBusiness_OrganizationInfo $organizationInfo)
    {
        $this->organizationInfo = $organizationInfo;
    }

    public function getOrganizationInfo()
    {
        return $this->organizationInfo;
    }

    public function setPermissionLevel($permissionLevel)
    {
        $this->permissionLevel = $permissionLevel;
    }

    public function getPermissionLevel()
    {
        return $this->permissionLevel;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setState(Google_Service_MyBusiness_AccountState $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}

class Google_Service_MyBusiness_AccountState extends Model
{
    protected $internal_gapi_mappings = array();
    public $status;


    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}

class Google_Service_MyBusiness_AdWordsLocationExtensions extends Model
{
    protected $internal_gapi_mappings = array();
    public $adPhone;


    public function setAdPhone($adPhone)
    {
        $this->adPhone = $adPhone;
    }

    public function getAdPhone()
    {
        return $this->adPhone;
    }
}

class Google_Service_MyBusiness_AddressInput extends Model
{
    protected $internal_gapi_mappings = array();
    public $mailerContactName;


    public function setMailerContactName($mailerContactName)
    {
        $this->mailerContactName = $mailerContactName;
    }

    public function getMailerContactName()
    {
        return $this->mailerContactName;
    }
}

class Google_Service_MyBusiness_AddressVerificationData extends Model
{
    protected $internal_gapi_mappings = array();
    protected $addressType = 'Google_Service_MyBusiness_PostalAddress';
    protected $addressDataType = '';
    public $businessName;


    public function setAddress(Google_Service_MyBusiness_PostalAddress $address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
    }

    public function getBusinessName()
    {
        return $this->businessName;
    }
}

class Google_Service_MyBusiness_Admin extends Model
{
    protected $internal_gapi_mappings = array();
    public $adminName;
    public $name;
    public $pendingInvitation;
    public $role;


    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;
    }

    public function getAdminName()
    {
        return $this->adminName;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPendingInvitation($pendingInvitation)
    {
        $this->pendingInvitation = $pendingInvitation;
    }

    public function getPendingInvitation()
    {
        return $this->pendingInvitation;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }
}

class Google_Service_MyBusiness_Answer extends Model
{
    protected $internal_gapi_mappings = array();
    protected $authorType = 'Google_Service_MyBusiness_Author';
    protected $authorDataType = '';
    public $createTime;
    public $name;
    public $text;
    public $updateTime;
    public $upvoteCount;


    public function setAuthor(Google_Service_MyBusiness_Author $author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    public function setUpvoteCount($upvoteCount)
    {
        $this->upvoteCount = $upvoteCount;
    }

    public function getUpvoteCount()
    {
        return $this->upvoteCount;
    }
}

class Google_Service_MyBusiness_AssociateLocationRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $placeId;


    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    public function getPlaceId()
    {
        return $this->placeId;
    }
}

class Google_Service_MyBusiness_Attribute extends Collection
{
    protected $collection_key = 'values';
    protected $internal_gapi_mappings = array();
    public $attributeId;
    protected $repeatedEnumValueType = 'Google_Service_MyBusiness_RepeatedEnumAttributeValue';
    protected $repeatedEnumValueDataType = '';
    protected $urlValuesType = 'Google_Service_MyBusiness_UrlAttributeValue';
    protected $urlValuesDataType = 'array';
    public $valueType;
    public $values;


    public function setAttributeId($attributeId)
    {
        $this->attributeId = $attributeId;
    }

    public function getAttributeId()
    {
        return $this->attributeId;
    }

    public function setRepeatedEnumValue(Google_Service_MyBusiness_RepeatedEnumAttributeValue $repeatedEnumValue)
    {
        $this->repeatedEnumValue = $repeatedEnumValue;
    }

    public function getRepeatedEnumValue()
    {
        return $this->repeatedEnumValue;
    }

    public function setUrlValues($urlValues)
    {
        $this->urlValues = $urlValues;
    }

    public function getUrlValues()
    {
        return $this->urlValues;
    }

    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
    }

    public function getValueType()
    {
        return $this->valueType;
    }

    public function setValues($values)
    {
        $this->values = $values;
    }

    public function getValues()
    {
        return $this->values;
    }
}

class Google_Service_MyBusiness_AttributeMetadata extends Collection
{
    protected $collection_key = 'valueMetadata';
    protected $internal_gapi_mappings = array();
    public $attributeId;
    public $displayName;
    public $groupDisplayName;
    public $isDeprecated;
    public $isRepeatable;
    protected $valueMetadataType = 'Google_Service_MyBusiness_AttributeValueMetadata';
    protected $valueMetadataDataType = 'array';
    public $valueType;


    public function setAttributeId($attributeId)
    {
        $this->attributeId = $attributeId;
    }

    public function getAttributeId()
    {
        return $this->attributeId;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setGroupDisplayName($groupDisplayName)
    {
        $this->groupDisplayName = $groupDisplayName;
    }

    public function getGroupDisplayName()
    {
        return $this->groupDisplayName;
    }

    public function setIsDeprecated($isDeprecated)
    {
        $this->isDeprecated = $isDeprecated;
    }

    public function getIsDeprecated()
    {
        return $this->isDeprecated;
    }

    public function setIsRepeatable($isRepeatable)
    {
        $this->isRepeatable = $isRepeatable;
    }

    public function getIsRepeatable()
    {
        return $this->isRepeatable;
    }

    public function setValueMetadata($valueMetadata)
    {
        $this->valueMetadata = $valueMetadata;
    }

    public function getValueMetadata()
    {
        return $this->valueMetadata;
    }

    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
    }

    public function getValueType()
    {
        return $this->valueType;
    }
}

class Google_Service_MyBusiness_AttributeValueMetadata extends Model
{
    protected $internal_gapi_mappings = array();
    public $displayName;
    public $value;


    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

class Google_Service_MyBusiness_Attribution extends Model
{
    protected $internal_gapi_mappings = array();
    public $profileName;
    public $profilePhotoUrl;
    public $profileUrl;
    public $takedownUrl;


    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
    }

    public function getProfileName()
    {
        return $this->profileName;
    }

    public function setProfilePhotoUrl($profilePhotoUrl)
    {
        $this->profilePhotoUrl = $profilePhotoUrl;
    }

    public function getProfilePhotoUrl()
    {
        return $this->profilePhotoUrl;
    }

    public function setProfileUrl($profileUrl)
    {
        $this->profileUrl = $profileUrl;
    }

    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    public function setTakedownUrl($takedownUrl)
    {
        $this->takedownUrl = $takedownUrl;
    }

    public function getTakedownUrl()
    {
        return $this->takedownUrl;
    }
}

class Google_Service_MyBusiness_Author extends Model
{
    protected $internal_gapi_mappings = array();
    public $displayName;
    public $profilePhotoUrl;
    public $type;


    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setProfilePhotoUrl($profilePhotoUrl)
    {
        $this->profilePhotoUrl = $profilePhotoUrl;
    }

    public function getProfilePhotoUrl()
    {
        return $this->profilePhotoUrl;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}

class Google_Service_MyBusiness_BasicMetricsRequest extends Collection
{
    protected $collection_key = 'metricRequests';
    protected $internal_gapi_mappings = array();
    protected $metricRequestsType = 'Google_Service_MyBusiness_MetricRequest';
    protected $metricRequestsDataType = 'array';
    protected $timeRangeType = 'Google_Service_MyBusiness_TimeRange';
    protected $timeRangeDataType = '';


    public function setMetricRequests($metricRequests)
    {
        $this->metricRequests = $metricRequests;
    }

    public function getMetricRequests()
    {
        return $this->metricRequests;
    }

    public function setTimeRange(Google_Service_MyBusiness_TimeRange $timeRange)
    {
        $this->timeRange = $timeRange;
    }

    public function getTimeRange()
    {
        return $this->timeRange;
    }
}

class Google_Service_MyBusiness_BatchGetBusinessCategoriesResponse extends Collection
{
    protected $collection_key = 'categories';
    protected $internal_gapi_mappings = array();
    protected $categoriesType = 'Google_Service_MyBusiness_Category';
    protected $categoriesDataType = 'array';


    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}

class Google_Service_MyBusiness_BatchGetLocationsRequest extends Collection
{
    protected $collection_key = 'locationNames';
    protected $internal_gapi_mappings = array();
    public $locationNames;


    public function setLocationNames($locationNames)
    {
        $this->locationNames = $locationNames;
    }

    public function getLocationNames()
    {
        return $this->locationNames;
    }
}

class Google_Service_MyBusiness_BatchGetLocationsResponse extends Collection
{
    protected $collection_key = 'locations';
    protected $internal_gapi_mappings = array();
    protected $locationsType = 'Google_Service_MyBusiness_Location';
    protected $locationsDataType = 'array';


    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    public function getLocations()
    {
        return $this->locations;
    }
}

class Google_Service_MyBusiness_BatchGetReviewsRequest extends Collection
{
    protected $collection_key = 'locationNames';
    protected $internal_gapi_mappings = array();
    public $ignoreRatingOnlyReviews;
    public $locationNames;
    public $orderBy;
    public $pageSize;
    public $pageToken;


    public function setIgnoreRatingOnlyReviews($ignoreRatingOnlyReviews)
    {
        $this->ignoreRatingOnlyReviews = $ignoreRatingOnlyReviews;
    }

    public function getIgnoreRatingOnlyReviews()
    {
        return $this->ignoreRatingOnlyReviews;
    }

    public function setLocationNames($locationNames)
    {
        $this->locationNames = $locationNames;
    }

    public function getLocationNames()
    {
        return $this->locationNames;
    }

    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function getOrderBy()
    {
        return $this->orderBy;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    public function getPageToken()
    {
        return $this->pageToken;
    }
}

class Google_Service_MyBusiness_BatchGetReviewsResponse extends Collection
{
    protected $collection_key = 'locationReviews';
    protected $internal_gapi_mappings = array();
    protected $locationReviewsType = 'Google_Service_MyBusiness_LocationReview';
    protected $locationReviewsDataType = 'array';
    public $nextPageToken;


    public function setLocationReviews($locationReviews)
    {
        $this->locationReviews = $locationReviews;
    }

    public function getLocationReviews()
    {
        return $this->locationReviews;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
}

class Google_Service_MyBusiness_BusinessHours extends Collection
{
    protected $collection_key = 'periods';
    protected $internal_gapi_mappings = array();
    protected $periodsType = 'Google_Service_MyBusiness_TimePeriod';
    protected $periodsDataType = 'array';


    public function setPeriods($periods)
    {
        $this->periods = $periods;
    }

    public function getPeriods()
    {
        return $this->periods;
    }
}

class Google_Service_MyBusiness_CallToAction extends Model
{
    protected $internal_gapi_mappings = array();
    public $actionType;
    public $url;


    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
    }

    public function getActionType()
    {
        return $this->actionType;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}

class Google_Service_MyBusiness_CaloriesFact extends Model
{
    protected $internal_gapi_mappings = array();
    public $lowerAmount;
    public $unit;
    public $upperAmount;


    public function setLowerAmount($lowerAmount)
    {
        $this->lowerAmount = $lowerAmount;
    }

    public function getLowerAmount()
    {
        return $this->lowerAmount;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function setUpperAmount($upperAmount)
    {
        $this->upperAmount = $upperAmount;
    }

    public function getUpperAmount()
    {
        return $this->upperAmount;
    }
}

class Google_Service_MyBusiness_Category extends Collection
{
    protected $collection_key = 'serviceTypes';
    protected $internal_gapi_mappings = array();
    public $categoryId;
    public $displayName;
    protected $serviceTypesType = 'Google_Service_MyBusiness_ServiceType';
    protected $serviceTypesDataType = 'array';


    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setServiceTypes($serviceTypes)
    {
        $this->serviceTypes = $serviceTypes;
    }

    public function getServiceTypes()
    {
        return $this->serviceTypes;
    }
}

class Google_Service_MyBusiness_Chain extends Collection
{
    protected $collection_key = 'websites';
    protected $internal_gapi_mappings = array();
    protected $chainNamesType = 'Google_Service_MyBusiness_ChainName';
    protected $chainNamesDataType = 'array';
    public $locationCount;
    public $name;
    protected $websitesType = 'Google_Service_MyBusiness_ChainUrl';
    protected $websitesDataType = 'array';


    public function setChainNames($chainNames)
    {
        $this->chainNames = $chainNames;
    }

    public function getChainNames()
    {
        return $this->chainNames;
    }

    public function setLocationCount($locationCount)
    {
        $this->locationCount = $locationCount;
    }

    public function getLocationCount()
    {
        return $this->locationCount;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setWebsites($websites)
    {
        $this->websites = $websites;
    }

    public function getWebsites()
    {
        return $this->websites;
    }
}

class Google_Service_MyBusiness_ChainName extends Model
{
    protected $internal_gapi_mappings = array();
    public $displayName;
    public $languageCode;


    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }
}

class Google_Service_MyBusiness_ChainUrl extends Model
{
    protected $internal_gapi_mappings = array();
    public $url;


    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}

class Google_Service_MyBusiness_ClearLocationAssociationRequest extends Model
{
}

class Google_Service_MyBusiness_CompleteVerificationRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $pin;


    public function setPin($pin)
    {
        $this->pin = $pin;
    }

    public function getPin()
    {
        return $this->pin;
    }
}

class Google_Service_MyBusiness_CompleteVerificationResponse extends Model
{
    protected $internal_gapi_mappings = array();
    protected $verificationType = 'Google_Service_MyBusiness_Verification';
    protected $verificationDataType = '';


    public function setVerification(Google_Service_MyBusiness_Verification $verification)
    {
        $this->verification = $verification;
    }

    public function getVerification()
    {
        return $this->verification;
    }
}

class Google_Service_MyBusiness_Date extends Model
{
    protected $internal_gapi_mappings = array();
    public $day;
    public $month;
    public $year;


    public function setDay($day)
    {
        $this->day = $day;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }
}

class Google_Service_MyBusiness_DeclineInvitationRequest extends Model
{
}

class Google_Service_MyBusiness_DimensionalMetricValue extends Model
{
    protected $internal_gapi_mappings = array();
    public $metricOption;
    protected $timeDimensionType = 'Google_Service_MyBusiness_TimeDimension';
    protected $timeDimensionDataType = '';
    public $value;


    public function setMetricOption($metricOption)
    {
        $this->metricOption = $metricOption;
    }

    public function getMetricOption()
    {
        return $this->metricOption;
    }

    public function setTimeDimension(Google_Service_MyBusiness_TimeDimension $timeDimension)
    {
        $this->timeDimension = $timeDimension;
    }

    public function getTimeDimension()
    {
        return $this->timeDimension;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

class Google_Service_MyBusiness_Dimensions extends Model
{
    protected $internal_gapi_mappings = array();
    public $heightPixels;
    public $widthPixels;


    public function setHeightPixels($heightPixels)
    {
        $this->heightPixels = $heightPixels;
    }

    public function getHeightPixels()
    {
        return $this->heightPixels;
    }

    public function setWidthPixels($widthPixels)
    {
        $this->widthPixels = $widthPixels;
    }

    public function getWidthPixels()
    {
        return $this->widthPixels;
    }
}

class Google_Service_MyBusiness_DrivingDirectionMetricsRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $languageCode;
    public $numDays;


    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setNumDays($numDays)
    {
        $this->numDays = $numDays;
    }

    public function getNumDays()
    {
        return $this->numDays;
    }
}

class Google_Service_MyBusiness_Duplicate extends Model
{
    protected $internal_gapi_mappings = array();
    public $access;
    public $locationName;
    public $placeId;


    public function setAccess($access)
    {
        $this->access = $access;
    }

    public function getAccess()
    {
        return $this->access;
    }

    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getLocationName()
    {
        return $this->locationName;
    }

    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    public function getPlaceId()
    {
        return $this->placeId;
    }
}

class Google_Service_MyBusiness_EmailInput extends Model
{
    protected $internal_gapi_mappings = array();
    public $emailAddress;


    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
}

class Google_Service_MyBusiness_EmailVerificationData extends Model
{
    protected $internal_gapi_mappings = array();
    public $domainName;
    public $isUserNameEditable;
    public $userName;


    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
    }

    public function getDomainName()
    {
        return $this->domainName;
    }

    public function setIsUserNameEditable($isUserNameEditable)
    {
        $this->isUserNameEditable = $isUserNameEditable;
    }

    public function getIsUserNameEditable()
    {
        return $this->isUserNameEditable;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }
}

class Google_Service_MyBusiness_FetchVerificationOptionsRequest extends Model
{
    protected $internal_gapi_mappings = array();
    protected $contextType = 'Google_Service_MyBusiness_ServiceBusinessContext';
    protected $contextDataType = '';
    public $languageCode;


    public function setContext(Google_Service_MyBusiness_ServiceBusinessContext $context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }
}

class Google_Service_MyBusiness_FetchVerificationOptionsResponse extends Collection
{
    protected $collection_key = 'options';
    protected $internal_gapi_mappings = array();
    protected $optionsType = 'Google_Service_MyBusiness_VerificationOption';
    protected $optionsDataType = 'array';


    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }
}

class Google_Service_MyBusiness_FindMatchingLocationsRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $languageCode;
    public $maxCacheDuration;
    public $numResults;


    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setMaxCacheDuration($maxCacheDuration)
    {
        $this->maxCacheDuration = $maxCacheDuration;
    }

    public function getMaxCacheDuration()
    {
        return $this->maxCacheDuration;
    }

    public function setNumResults($numResults)
    {
        $this->numResults = $numResults;
    }

    public function getNumResults()
    {
        return $this->numResults;
    }
}

class Google_Service_MyBusiness_FindMatchingLocationsResponse extends Collection
{
    protected $collection_key = 'matchedLocations';
    protected $internal_gapi_mappings = array();
    public $matchTime;
    protected $matchedLocationsType = 'Google_Service_MyBusiness_MatchedLocation';
    protected $matchedLocationsDataType = 'array';


    public function setMatchTime($matchTime)
    {
        $this->matchTime = $matchTime;
    }

    public function getMatchTime()
    {
        return $this->matchTime;
    }

    public function setMatchedLocations($matchedLocations)
    {
        $this->matchedLocations = $matchedLocations;
    }

    public function getMatchedLocations()
    {
        return $this->matchedLocations;
    }
}

class Google_Service_MyBusiness_FollowersMetadata extends Model
{
    protected $internal_gapi_mappings = array();
    public $count;
    public $name;


    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Google_Service_MyBusiness_FoodMenu extends Collection
{
    protected $collection_key = 'sections';
    protected $internal_gapi_mappings = array();
    public $cuisines;
    protected $labelsType = 'Google_Service_MyBusiness_MenuLabel';
    protected $labelsDataType = 'array';
    protected $sectionsType = 'Google_Service_MyBusiness_FoodMenuSection';
    protected $sectionsDataType = 'array';
    public $sourceUrl;


    public function setCuisines($cuisines)
    {
        $this->cuisines = $cuisines;
    }

    public function getCuisines()
    {
        return $this->cuisines;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    public function getSections()
    {
        return $this->sections;
    }

    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;
    }

    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }
}

class Google_Service_MyBusiness_FoodMenuItem extends Collection
{
    protected $collection_key = 'options';
    protected $internal_gapi_mappings = array();
    protected $attributesType = 'Google_Service_MyBusiness_FoodMenuItemAttributes';
    protected $attributesDataType = '';
    protected $labelsType = 'Google_Service_MyBusiness_MenuLabel';
    protected $labelsDataType = 'array';
    protected $optionsType = 'Google_Service_MyBusiness_FoodMenuItemOption';
    protected $optionsDataType = 'array';


    public function setAttributes(Google_Service_MyBusiness_FoodMenuItemAttributes $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }
}

class Google_Service_MyBusiness_FoodMenuItemAttributes extends Collection
{
    protected $collection_key = 'preparationMethods';
    protected $internal_gapi_mappings = array();
    public $allergen;
    public $dietaryRestriction;
    protected $ingredientsType = 'Google_Service_MyBusiness_Ingredient';
    protected $ingredientsDataType = 'array';
    public $mediaKeys;
    protected $nutritionFactsType = 'Google_Service_MyBusiness_NutritionFacts';
    protected $nutritionFactsDataType = '';
    protected $portionSizeType = 'Google_Service_MyBusiness_PortionSize';
    protected $portionSizeDataType = '';
    public $preparationMethods;
    protected $priceType = 'Google_Service_MyBusiness_Money';
    protected $priceDataType = '';
    public $servesNumPeople;
    public $spiciness;


    public function setAllergen($allergen)
    {
        $this->allergen = $allergen;
    }

    public function getAllergen()
    {
        return $this->allergen;
    }

    public function setDietaryRestriction($dietaryRestriction)
    {
        $this->dietaryRestriction = $dietaryRestriction;
    }

    public function getDietaryRestriction()
    {
        return $this->dietaryRestriction;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setMediaKeys($mediaKeys)
    {
        $this->mediaKeys = $mediaKeys;
    }

    public function getMediaKeys()
    {
        return $this->mediaKeys;
    }

    public function setNutritionFacts(Google_Service_MyBusiness_NutritionFacts $nutritionFacts)
    {
        $this->nutritionFacts = $nutritionFacts;
    }

    public function getNutritionFacts()
    {
        return $this->nutritionFacts;
    }

    public function setPortionSize(Google_Service_MyBusiness_PortionSize $portionSize)
    {
        $this->portionSize = $portionSize;
    }

    public function getPortionSize()
    {
        return $this->portionSize;
    }

    public function setPreparationMethods($preparationMethods)
    {
        $this->preparationMethods = $preparationMethods;
    }

    public function getPreparationMethods()
    {
        return $this->preparationMethods;
    }

    public function setPrice(Google_Service_MyBusiness_Money $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setServesNumPeople($servesNumPeople)
    {
        $this->servesNumPeople = $servesNumPeople;
    }

    public function getServesNumPeople()
    {
        return $this->servesNumPeople;
    }

    public function setSpiciness($spiciness)
    {
        $this->spiciness = $spiciness;
    }

    public function getSpiciness()
    {
        return $this->spiciness;
    }
}

class Google_Service_MyBusiness_FoodMenuItemOption extends Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = array();
    protected $attributesType = 'Google_Service_MyBusiness_FoodMenuItemAttributes';
    protected $attributesDataType = '';
    protected $labelsType = 'Google_Service_MyBusiness_MenuLabel';
    protected $labelsDataType = 'array';


    public function setAttributes(Google_Service_MyBusiness_FoodMenuItemAttributes $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }
}

class Google_Service_MyBusiness_FoodMenuSection extends Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = array();
    protected $itemsType = 'Google_Service_MyBusiness_FoodMenuItem';
    protected $itemsDataType = 'array';
    protected $labelsType = 'Google_Service_MyBusiness_MenuLabel';
    protected $labelsDataType = 'array';


    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }
}

class Google_Service_MyBusiness_FoodMenus extends Collection
{
    protected $collection_key = 'menus';
    protected $internal_gapi_mappings = array();
    protected $menusType = 'Google_Service_MyBusiness_FoodMenu';
    protected $menusDataType = 'array';
    public $name;


    public function setMenus($menus)
    {
        $this->menus = $menus;
    }

    public function getMenus()
    {
        return $this->menus;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Google_Service_MyBusiness_FreeFormServiceItem extends Model
{
    protected $internal_gapi_mappings = array();
    public $categoryId;
    protected $labelType = 'Google_Service_MyBusiness_Label';
    protected $labelDataType = '';


    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setLabel(Google_Service_MyBusiness_Label $label)
    {
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }
}

class Google_Service_MyBusiness_GenerateAccountNumberRequest extends Model
{
}

class Google_Service_MyBusiness_GoogleLocation extends Model
{
    protected $internal_gapi_mappings = array();
    protected $locationType = 'Google_Service_MyBusiness_Location';
    protected $locationDataType = '';
    public $name;
    public $requestAdminRightsUrl;


    public function setLocation(Google_Service_MyBusiness_Location $location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRequestAdminRightsUrl($requestAdminRightsUrl)
    {
        $this->requestAdminRightsUrl = $requestAdminRightsUrl;
    }

    public function getRequestAdminRightsUrl()
    {
        return $this->requestAdminRightsUrl;
    }
}

class Google_Service_MyBusiness_GoogleUpdatedLocation extends Model
{
    protected $internal_gapi_mappings = array();
    public $diffMask;
    protected $locationType = 'Google_Service_MyBusiness_Location';
    protected $locationDataType = '';


    public function setDiffMask($diffMask)
    {
        $this->diffMask = $diffMask;
    }

    public function getDiffMask()
    {
        return $this->diffMask;
    }

    public function setLocation(Google_Service_MyBusiness_Location $location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }
}

class Google_Service_MyBusiness_Ingredient extends Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = array();
    protected $labelsType = 'Google_Service_MyBusiness_MenuLabel';
    protected $labelsDataType = 'array';


    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }
}

class Google_Service_MyBusiness_Invitation extends Model
{
    protected $internal_gapi_mappings = array();
    public $name;
    public $role;
    protected $targetAccountType = 'Google_Service_MyBusiness_Account';
    protected $targetAccountDataType = '';
    protected $targetLocationType = 'Google_Service_MyBusiness_TargetLocation';
    protected $targetLocationDataType = '';


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setTargetAccount(Google_Service_MyBusiness_Account $targetAccount)
    {
        $this->targetAccount = $targetAccount;
    }

    public function getTargetAccount()
    {
        return $this->targetAccount;
    }

    public function setTargetLocation(Google_Service_MyBusiness_TargetLocation $targetLocation)
    {
        $this->targetLocation = $targetLocation;
    }

    public function getTargetLocation()
    {
        return $this->targetLocation;
    }
}

class Google_Service_MyBusiness_Item extends Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = array();
    public $itemId;
    protected $labelsType = 'Google_Service_MyBusiness_Label';
    protected $labelsDataType = 'array';
    protected $priceType = 'Google_Service_MyBusiness_Money';
    protected $priceDataType = '';


    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setPrice(Google_Service_MyBusiness_Money $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class Google_Service_MyBusiness_Label extends Model
{
    protected $internal_gapi_mappings = array();
    public $description;
    public $displayName;
    public $languageCode;


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }
}

class Google_Service_MyBusiness_LatLng extends Model
{
    protected $internal_gapi_mappings = array();
    public $latitude;
    public $longitude;


    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }
}

class Google_Service_MyBusiness_ListAccountAdminsResponse extends Collection
{
    protected $collection_key = 'admins';
    protected $internal_gapi_mappings = array();
    protected $adminsType = 'Google_Service_MyBusiness_Admin';
    protected $adminsDataType = 'array';


    public function setAdmins($admins)
    {
        $this->admins = $admins;
    }

    public function getAdmins()
    {
        return $this->admins;
    }
}

class Google_Service_MyBusiness_ListAccountsResponse extends Collection
{
    protected $collection_key = 'accounts';
    protected $internal_gapi_mappings = array();
    protected $accountsType = 'Google_Service_MyBusiness_Account';
    protected $accountsDataType = 'array';
    public $nextPageToken;


    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

    public function getAccounts()
    {
        return $this->accounts;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
}

class Google_Service_MyBusiness_ListAnswersResponse extends Collection
{
    protected $collection_key = 'answers';
    protected $internal_gapi_mappings = array();
    protected $answersType = 'Google_Service_MyBusiness_Answer';
    protected $answersDataType = 'array';
    public $nextPageToken;
    public $totalSize;


    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalSize($totalSize)
    {
        $this->totalSize = $totalSize;
    }

    public function getTotalSize()
    {
        return $this->totalSize;
    }
}

class Google_Service_MyBusiness_ListAttributeMetadataResponse extends Collection
{
    protected $collection_key = 'attributes';
    protected $internal_gapi_mappings = array();
    protected $attributesType = 'Google_Service_MyBusiness_AttributeMetadata';
    protected $attributesDataType = 'array';
    public $nextPageToken;


    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
}

class Google_Service_MyBusiness_ListBusinessCategoriesResponse extends Collection
{
    protected $collection_key = 'categories';
    protected $internal_gapi_mappings = array();
    protected $categoriesType = 'Google_Service_MyBusiness_Category';
    protected $categoriesDataType = 'array';
    public $nextPageToken;
    public $totalCategoryCount;


    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalCategoryCount($totalCategoryCount)
    {
        $this->totalCategoryCount = $totalCategoryCount;
    }

    public function getTotalCategoryCount()
    {
        return $this->totalCategoryCount;
    }
}

class Google_Service_MyBusiness_ListCustomerMediaItemsResponse extends Collection
{
    protected $collection_key = 'mediaItems';
    protected $internal_gapi_mappings = array();
    protected $mediaItemsType = 'Google_Service_MyBusiness_MediaItem';
    protected $mediaItemsDataType = 'array';
    public $nextPageToken;
    public $totalMediaItemCount;


    public function setMediaItems($mediaItems)
    {
        $this->mediaItems = $mediaItems;
    }

    public function getMediaItems()
    {
        return $this->mediaItems;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalMediaItemCount($totalMediaItemCount)
    {
        $this->totalMediaItemCount = $totalMediaItemCount;
    }

    public function getTotalMediaItemCount()
    {
        return $this->totalMediaItemCount;
    }
}

class Google_Service_MyBusiness_ListInvitationsResponse extends Collection
{
    protected $collection_key = 'invitations';
    protected $internal_gapi_mappings = array();
    protected $invitationsType = 'Google_Service_MyBusiness_Invitation';
    protected $invitationsDataType = 'array';


    public function setInvitations($invitations)
    {
        $this->invitations = $invitations;
    }

    public function getInvitations()
    {
        return $this->invitations;
    }
}

class Google_Service_MyBusiness_ListLocalPostsResponse extends Collection
{
    protected $collection_key = 'localPosts';
    protected $internal_gapi_mappings = array();
    protected $localPostsType = 'Google_Service_MyBusiness_LocalPost';
    protected $localPostsDataType = 'array';
    public $nextPageToken;


    public function setLocalPosts($localPosts)
    {
        $this->localPosts = $localPosts;
    }

    public function getLocalPosts()
    {
        return $this->localPosts;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
}

class Google_Service_MyBusiness_ListLocationAdminsResponse extends Collection
{
    protected $collection_key = 'admins';
    protected $internal_gapi_mappings = array();
    protected $adminsType = 'Google_Service_MyBusiness_Admin';
    protected $adminsDataType = 'array';


    public function setAdmins($admins)
    {
        $this->admins = $admins;
    }

    public function getAdmins()
    {
        return $this->admins;
    }
}

class Google_Service_MyBusiness_ListLocationsResponse extends Collection
{
    protected $collection_key = 'locations';
    protected $internal_gapi_mappings = array();
    protected $locationsType = 'Google_Service_MyBusiness_Location';
    protected $locationsDataType = 'array';
    public $nextPageToken;
    public $totalSize;


    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    public function getLocations()
    {
        return $this->locations;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalSize($totalSize)
    {
        $this->totalSize = $totalSize;
    }

    public function getTotalSize()
    {
        return $this->totalSize;
    }
}

class Google_Service_MyBusiness_ListMediaItemsResponse extends Collection
{
    protected $collection_key = 'mediaItems';
    protected $internal_gapi_mappings = array();
    protected $mediaItemsType = 'Google_Service_MyBusiness_MediaItem';
    protected $mediaItemsDataType = 'array';
    public $nextPageToken;
    public $totalMediaItemCount;


    public function setMediaItems($mediaItems)
    {
        $this->mediaItems = $mediaItems;
    }

    public function getMediaItems()
    {
        return $this->mediaItems;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalMediaItemCount($totalMediaItemCount)
    {
        $this->totalMediaItemCount = $totalMediaItemCount;
    }

    public function getTotalMediaItemCount()
    {
        return $this->totalMediaItemCount;
    }
}

class Google_Service_MyBusiness_ListQuestionsResponse extends Collection
{
    protected $collection_key = 'questions';
    protected $internal_gapi_mappings = array();
    public $nextPageToken;
    protected $questionsType = 'Google_Service_MyBusiness_Question';
    protected $questionsDataType = 'array';
    public $totalSize;


    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setTotalSize($totalSize)
    {
        $this->totalSize = $totalSize;
    }

    public function getTotalSize()
    {
        return $this->totalSize;
    }
}

class Google_Service_MyBusiness_ListRecommendedGoogleLocationsResponse extends Collection
{
    protected $collection_key = 'googleLocations';
    protected $internal_gapi_mappings = array();
    protected $googleLocationsType = 'Google_Service_MyBusiness_GoogleLocation';
    protected $googleLocationsDataType = 'array';
    public $nextPageToken;
    public $totalSize;


    public function setGoogleLocations($googleLocations)
    {
        $this->googleLocations = $googleLocations;
    }

    public function getGoogleLocations()
    {
        return $this->googleLocations;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setTotalSize($totalSize)
    {
        $this->totalSize = $totalSize;
    }

    public function getTotalSize()
    {
        return $this->totalSize;
    }
}

class Google_Service_MyBusiness_ListReviewsResponse extends Collection
{
    protected $collection_key = 'reviews';
    protected $internal_gapi_mappings = array();
    public $averageRating;
    public $nextPageToken;
    protected $reviewsType = 'Google_Service_MyBusiness_Review';
    protected $reviewsDataType = 'array';
    public $totalReviewCount;


    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;
    }

    public function getAverageRating()
    {
        return $this->averageRating;
    }

    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    public function getReviews()
    {
        return $this->reviews;
    }

    public function setTotalReviewCount($totalReviewCount)
    {
        $this->totalReviewCount = $totalReviewCount;
    }

    public function getTotalReviewCount()
    {
        return $this->totalReviewCount;
    }
}

class Google_Service_MyBusiness_ListVerificationsResponse extends Collection
{
    protected $collection_key = 'verifications';
    protected $internal_gapi_mappings = array();
    public $nextPageToken;
    protected $verificationsType = 'Google_Service_MyBusiness_Verification';
    protected $verificationsDataType = 'array';


    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    public function setVerifications($verifications)
    {
        $this->verifications = $verifications;
    }

    public function getVerifications()
    {
        return $this->verifications;
    }
}

class Google_Service_MyBusiness_LocalPost extends Collection
{
    protected $collection_key = 'media';
    protected $internal_gapi_mappings = array();
    public $alertType;
    protected $callToActionType = 'Google_Service_MyBusiness_CallToAction';
    protected $callToActionDataType = '';
    public $createTime;
    protected $eventType = 'Google_Service_MyBusiness_LocalPostEvent';
    protected $eventDataType = '';
    public $languageCode;
    protected $mediaType = 'Google_Service_MyBusiness_MediaItem';
    protected $mediaDataType = 'array';
    public $name;
    protected $offerType = 'Google_Service_MyBusiness_LocalPostOffer';
    protected $offerDataType = '';
    public $searchUrl;
    public $state;
    public $summary;
    public $topicType;
    public $updateTime;


    public function setAlertType($alertType)
    {
        $this->alertType = $alertType;
    }

    public function getAlertType()
    {
        return $this->alertType;
    }

    public function setCallToAction(Google_Service_MyBusiness_CallToAction $callToAction)
    {
        $this->callToAction = $callToAction;
    }

    public function getCallToAction()
    {
        return $this->callToAction;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setEvent(Google_Service_MyBusiness_LocalPostEvent $event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setMedia($media)
    {
        $this->media = $media;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOffer(Google_Service_MyBusiness_LocalPostOffer $offer)
    {
        $this->offer = $offer;
    }

    public function getOffer()
    {
        return $this->offer;
    }

    public function setSearchUrl($searchUrl)
    {
        $this->searchUrl = $searchUrl;
    }

    public function getSearchUrl()
    {
        return $this->searchUrl;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setTopicType($topicType)
    {
        $this->topicType = $topicType;
    }

    public function getTopicType()
    {
        return $this->topicType;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}

class Google_Service_MyBusiness_LocalPostEvent extends Model
{
    protected $internal_gapi_mappings = array();
    protected $scheduleType = 'Google_Service_MyBusiness_TimeInterval';
    protected $scheduleDataType = '';
    public $title;


    public function setSchedule(Google_Service_MyBusiness_TimeInterval $schedule)
    {
        $this->schedule = $schedule;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class Google_Service_MyBusiness_LocalPostMetrics extends Collection
{
    protected $collection_key = 'metricValues';
    protected $internal_gapi_mappings = array();
    public $localPostName;
    protected $metricValuesType = 'Google_Service_MyBusiness_MetricValue';
    protected $metricValuesDataType = 'array';


    public function setLocalPostName($localPostName)
    {
        $this->localPostName = $localPostName;
    }

    public function getLocalPostName()
    {
        return $this->localPostName;
    }

    public function setMetricValues($metricValues)
    {
        $this->metricValues = $metricValues;
    }

    public function getMetricValues()
    {
        return $this->metricValues;
    }
}

class Google_Service_MyBusiness_LocalPostOffer extends Model
{
    protected $internal_gapi_mappings = array();
    public $couponCode;
    public $redeemOnlineUrl;
    public $termsConditions;


    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    public function getCouponCode()
    {
        return $this->couponCode;
    }

    public function setRedeemOnlineUrl($redeemOnlineUrl)
    {
        $this->redeemOnlineUrl = $redeemOnlineUrl;
    }

    public function getRedeemOnlineUrl()
    {
        return $this->redeemOnlineUrl;
    }

    public function setTermsConditions($termsConditions)
    {
        $this->termsConditions = $termsConditions;
    }

    public function getTermsConditions()
    {
        return $this->termsConditions;
    }
}

class Google_Service_MyBusiness_Location extends Collection
{
    protected $collection_key = 'priceLists';
    protected $internal_gapi_mappings = array();
    protected $adWordsLocationExtensionsType = 'Google_Service_MyBusiness_AdWordsLocationExtensions';
    protected $adWordsLocationExtensionsDataType = '';
    protected $additionalCategoriesType = 'Google_Service_MyBusiness_Category';
    protected $additionalCategoriesDataType = 'array';
    public $additionalPhones;
    protected $addressType = 'Google_Service_MyBusiness_PostalAddress';
    protected $addressDataType = '';
    protected $attributesType = 'Google_Service_MyBusiness_Attribute';
    protected $attributesDataType = 'array';
    public $labels;
    public $languageCode;
    protected $latlngType = 'Google_Service_MyBusiness_LatLng';
    protected $latlngDataType = '';
    protected $locationKeyType = 'Google_Service_MyBusiness_LocationKey';
    protected $locationKeyDataType = '';
    public $locationName;
    protected $locationStateType = 'Google_Service_MyBusiness_LocationState';
    protected $locationStateDataType = '';
    protected $metadataType = 'Google_Service_MyBusiness_Metadata';
    protected $metadataDataType = '';
    public $name;
    protected $openInfoType = 'Google_Service_MyBusiness_OpenInfo';
    protected $openInfoDataType = '';
    protected $priceListsType = 'Google_Service_MyBusiness_PriceList';
    protected $priceListsDataType = 'array';
    protected $primaryCategoryType = 'Google_Service_MyBusiness_Category';
    protected $primaryCategoryDataType = '';
    public $primaryPhone;
    protected $profileType = 'Google_Service_MyBusiness_Profile';
    protected $profileDataType = '';
    protected $regularHoursType = 'Google_Service_MyBusiness_BusinessHours';
    protected $regularHoursDataType = '';
    protected $relationshipDataType = 'Google_Service_MyBusiness_RelationshipData';
    protected $relationshipDataDataType = '';
    protected $serviceAreaType = 'Google_Service_MyBusiness_ServiceAreaBusiness';
    protected $serviceAreaDataType = '';
    protected $specialHoursType = 'Google_Service_MyBusiness_SpecialHours';
    protected $specialHoursDataType = '';
    public $storeCode;
    public $websiteUrl;


    public function setAdWordsLocationExtensions(Google_Service_MyBusiness_AdWordsLocationExtensions $adWordsLocationExtensions)
    {
        $this->adWordsLocationExtensions = $adWordsLocationExtensions;
    }

    public function getAdWordsLocationExtensions()
    {
        return $this->adWordsLocationExtensions;
    }

    public function setAdditionalCategories($additionalCategories)
    {
        $this->additionalCategories = $additionalCategories;
    }

    public function getAdditionalCategories()
    {
        return $this->additionalCategories;
    }

    public function setAdditionalPhones($additionalPhones)
    {
        $this->additionalPhones = $additionalPhones;
    }

    public function getAdditionalPhones()
    {
        return $this->additionalPhones;
    }

    public function setAddress(Google_Service_MyBusiness_PostalAddress $address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
    {
        $this->latlng = $latlng;
    }

    public function getLatlng()
    {
        return $this->latlng;
    }

    public function setLocationKey(Google_Service_MyBusiness_LocationKey $locationKey)
    {
        $this->locationKey = $locationKey;
    }

    public function getLocationKey()
    {
        return $this->locationKey;
    }

    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getLocationName()
    {
        return $this->locationName;
    }

    public function setLocationState(Google_Service_MyBusiness_LocationState $locationState)
    {
        $this->locationState = $locationState;
    }

    public function getLocationState()
    {
        return $this->locationState;
    }

    public function setMetadata(Google_Service_MyBusiness_Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOpenInfo(Google_Service_MyBusiness_OpenInfo $openInfo)
    {
        $this->openInfo = $openInfo;
    }

    public function getOpenInfo()
    {
        return $this->openInfo;
    }

    public function setPriceLists($priceLists)
    {
        $this->priceLists = $priceLists;
    }

    public function getPriceLists()
    {
        return $this->priceLists;
    }

    public function setPrimaryCategory(Google_Service_MyBusiness_Category $primaryCategory)
    {
        $this->primaryCategory = $primaryCategory;
    }

    public function getPrimaryCategory()
    {
        return $this->primaryCategory;
    }

    public function setPrimaryPhone($primaryPhone)
    {
        $this->primaryPhone = $primaryPhone;
    }

    public function getPrimaryPhone()
    {
        return $this->primaryPhone;
    }

    public function setProfile(Google_Service_MyBusiness_Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setRegularHours(Google_Service_MyBusiness_BusinessHours $regularHours)
    {
        $this->regularHours = $regularHours;
    }

    public function getRegularHours()
    {
        return $this->regularHours;
    }

    public function setRelationshipData(Google_Service_MyBusiness_RelationshipData $relationshipData)
    {
        $this->relationshipData = $relationshipData;
    }

    public function getRelationshipData()
    {
        return $this->relationshipData;
    }

    public function setServiceArea(Google_Service_MyBusiness_ServiceAreaBusiness $serviceArea)
    {
        $this->serviceArea = $serviceArea;
    }

    public function getServiceArea()
    {
        return $this->serviceArea;
    }

    public function setSpecialHours(Google_Service_MyBusiness_SpecialHours $specialHours)
    {
        $this->specialHours = $specialHours;
    }

    public function getSpecialHours()
    {
        return $this->specialHours;
    }

    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
    }

    public function getStoreCode()
    {
        return $this->storeCode;
    }

    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }
}

class Google_Service_MyBusiness_LocationAssociation extends Model
{
    protected $internal_gapi_mappings = array();
    public $category;
    public $priceListItemId;


    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setPriceListItemId($priceListItemId)
    {
        $this->priceListItemId = $priceListItemId;
    }

    public function getPriceListItemId()
    {
        return $this->priceListItemId;
    }
}

class Google_Service_MyBusiness_LocationDrivingDirectionMetrics extends Collection
{
    protected $collection_key = 'topDirectionSources';
    protected $internal_gapi_mappings = array();
    public $locationName;
    public $timeZone;
    protected $topDirectionSourcesType = 'Google_Service_MyBusiness_TopDirectionSources';
    protected $topDirectionSourcesDataType = 'array';


    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getLocationName()
    {
        return $this->locationName;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    public function setTopDirectionSources($topDirectionSources)
    {
        $this->topDirectionSources = $topDirectionSources;
    }

    public function getTopDirectionSources()
    {
        return $this->topDirectionSources;
    }
}

class Google_Service_MyBusiness_LocationKey extends Model
{
    protected $internal_gapi_mappings = array();
    public $explicitNoPlaceId;
    public $placeId;
    public $plusPageId;
    public $requestId;


    public function setExplicitNoPlaceId($explicitNoPlaceId)
    {
        $this->explicitNoPlaceId = $explicitNoPlaceId;
    }

    public function getExplicitNoPlaceId()
    {
        return $this->explicitNoPlaceId;
    }

    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    public function getPlaceId()
    {
        return $this->placeId;
    }

    public function setPlusPageId($plusPageId)
    {
        $this->plusPageId = $plusPageId;
    }

    public function getPlusPageId()
    {
        return $this->plusPageId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }
}

class Google_Service_MyBusiness_LocationMetrics extends Collection
{
    protected $collection_key = 'metricValues';
    protected $internal_gapi_mappings = array();
    public $locationName;
    protected $metricValuesType = 'Google_Service_MyBusiness_MetricValue';
    protected $metricValuesDataType = 'array';
    public $timeZone;


    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getLocationName()
    {
        return $this->locationName;
    }

    public function setMetricValues($metricValues)
    {
        $this->metricValues = $metricValues;
    }

    public function getMetricValues()
    {
        return $this->metricValues;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }
}

class Google_Service_MyBusiness_LocationReview extends Model
{
    protected $internal_gapi_mappings = array();
    public $name;
    protected $reviewType = 'Google_Service_MyBusiness_Review';
    protected $reviewDataType = '';


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setReview(Google_Service_MyBusiness_Review $review)
    {
        $this->review = $review;
    }

    public function getReview()
    {
        return $this->review;
    }
}

class Google_Service_MyBusiness_LocationState extends Model
{
    protected $internal_gapi_mappings = array();
    public $canDelete;
    public $canHaveFoodMenus;
    public $canModifyServiceList;
    public $canUpdate;
    public $hasPendingEdits;
    public $hasPendingVerification;
    public $isDisabled;
    public $isDisconnected;
    public $isDuplicate;
    public $isGoogleUpdated;
    public $isLocalPostApiDisabled;
    public $isPendingReview;
    public $isPublished;
    public $isSuspended;
    public $isVerified;
    public $needsReverification;


    public function setCanDelete($canDelete)
    {
        $this->canDelete = $canDelete;
    }

    public function getCanDelete()
    {
        return $this->canDelete;
    }

    public function setCanHaveFoodMenus($canHaveFoodMenus)
    {
        $this->canHaveFoodMenus = $canHaveFoodMenus;
    }

    public function getCanHaveFoodMenus()
    {
        return $this->canHaveFoodMenus;
    }

    public function setCanModifyServiceList($canModifyServiceList)
    {
        $this->canModifyServiceList = $canModifyServiceList;
    }

    public function getCanModifyServiceList()
    {
        return $this->canModifyServiceList;
    }

    public function setCanUpdate($canUpdate)
    {
        $this->canUpdate = $canUpdate;
    }

    public function getCanUpdate()
    {
        return $this->canUpdate;
    }

    public function setHasPendingEdits($hasPendingEdits)
    {
        $this->hasPendingEdits = $hasPendingEdits;
    }

    public function getHasPendingEdits()
    {
        return $this->hasPendingEdits;
    }

    public function setHasPendingVerification($hasPendingVerification)
    {
        $this->hasPendingVerification = $hasPendingVerification;
    }

    public function getHasPendingVerification()
    {
        return $this->hasPendingVerification;
    }

    public function setIsDisabled($isDisabled)
    {
        $this->isDisabled = $isDisabled;
    }

    public function getIsDisabled()
    {
        return $this->isDisabled;
    }

    public function setIsDisconnected($isDisconnected)
    {
        $this->isDisconnected = $isDisconnected;
    }

    public function getIsDisconnected()
    {
        return $this->isDisconnected;
    }

    public function setIsDuplicate($isDuplicate)
    {
        $this->isDuplicate = $isDuplicate;
    }

    public function getIsDuplicate()
    {
        return $this->isDuplicate;
    }

    public function setIsGoogleUpdated($isGoogleUpdated)
    {
        $this->isGoogleUpdated = $isGoogleUpdated;
    }

    public function getIsGoogleUpdated()
    {
        return $this->isGoogleUpdated;
    }

    public function setIsLocalPostApiDisabled($isLocalPostApiDisabled)
    {
        $this->isLocalPostApiDisabled = $isLocalPostApiDisabled;
    }

    public function getIsLocalPostApiDisabled()
    {
        return $this->isLocalPostApiDisabled;
    }

    public function setIsPendingReview($isPendingReview)
    {
        $this->isPendingReview = $isPendingReview;
    }

    public function getIsPendingReview()
    {
        return $this->isPendingReview;
    }

    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    public function getIsPublished()
    {
        return $this->isPublished;
    }

    public function setIsSuspended($isSuspended)
    {
        $this->isSuspended = $isSuspended;
    }

    public function getIsSuspended()
    {
        return $this->isSuspended;
    }

    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;
    }

    public function getIsVerified()
    {
        return $this->isVerified;
    }

    public function setNeedsReverification($needsReverification)
    {
        $this->needsReverification = $needsReverification;
    }

    public function getNeedsReverification()
    {
        return $this->needsReverification;
    }
}

class Google_Service_MyBusiness_MatchedLocation extends Model
{
    protected $internal_gapi_mappings = array();
    public $isExactMatch;
    protected $locationType = 'Google_Service_MyBusiness_Location';
    protected $locationDataType = '';


    public function setIsExactMatch($isExactMatch)
    {
        $this->isExactMatch = $isExactMatch;
    }

    public function getIsExactMatch()
    {
        return $this->isExactMatch;
    }

    public function setLocation(Google_Service_MyBusiness_Location $location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }
}

class Google_Service_MyBusiness_MediaInsights extends Model
{
    protected $internal_gapi_mappings = array();
    public $viewCount;


    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }

    public function getViewCount()
    {
        return $this->viewCount;
    }
}

class Google_Service_MyBusiness_MediaItem extends Model
{
    protected $internal_gapi_mappings = array();
    protected $attributionType = 'Google_Service_MyBusiness_Attribution';
    protected $attributionDataType = '';
    public $createTime;
    protected $dataRefType = 'Google_Service_MyBusiness_MediaItemDataRef';
    protected $dataRefDataType = '';
    public $description;
    protected $dimensionsType = 'Google_Service_MyBusiness_Dimensions';
    protected $dimensionsDataType = '';
    public $googleUrl;
    protected $insightsType = 'Google_Service_MyBusiness_MediaInsights';
    protected $insightsDataType = '';
    protected $locationAssociationType = 'Google_Service_MyBusiness_LocationAssociation';
    protected $locationAssociationDataType = '';
    public $mediaFormat;
    public $name;
    public $sourceUrl;
    public $thumbnailUrl;


    public function setAttribution(Google_Service_MyBusiness_Attribution $attribution)
    {
        $this->attribution = $attribution;
    }

    public function getAttribution()
    {
        return $this->attribution;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setDataRef(Google_Service_MyBusiness_MediaItemDataRef $dataRef)
    {
        $this->dataRef = $dataRef;
    }

    public function getDataRef()
    {
        return $this->dataRef;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDimensions(Google_Service_MyBusiness_Dimensions $dimensions)
    {
        $this->dimensions = $dimensions;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setGoogleUrl($googleUrl)
    {
        $this->googleUrl = $googleUrl;
    }

    public function getGoogleUrl()
    {
        return $this->googleUrl;
    }

    public function setInsights(Google_Service_MyBusiness_MediaInsights $insights)
    {
        $this->insights = $insights;
    }

    public function getInsights()
    {
        return $this->insights;
    }

    public function setLocationAssociation(Google_Service_MyBusiness_LocationAssociation $locationAssociation)
    {
        $this->locationAssociation = $locationAssociation;
    }

    public function getLocationAssociation()
    {
        return $this->locationAssociation;
    }

    public function setMediaFormat($mediaFormat)
    {
        $this->mediaFormat = $mediaFormat;
    }

    public function getMediaFormat()
    {
        return $this->mediaFormat;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;
    }

    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }

    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }

    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }
}

class Google_Service_MyBusiness_MediaItemDataRef extends Model
{
    protected $internal_gapi_mappings = array();
    public $resourceName;


    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    public function getResourceName()
    {
        return $this->resourceName;
    }
}

class Google_Service_MyBusiness_MenuLabel extends Model
{
    protected $internal_gapi_mappings = array();
    public $description;
    public $displayName;
    public $languageCode;


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }
}

class Google_Service_MyBusiness_Metadata extends Model
{
    protected $internal_gapi_mappings = array();
    protected $duplicateType = 'Google_Service_MyBusiness_Duplicate';
    protected $duplicateDataType = '';
    public $mapsUrl;
    public $newReviewUrl;


    public function setDuplicate(Google_Service_MyBusiness_Duplicate $duplicate)
    {
        $this->duplicate = $duplicate;
    }

    public function getDuplicate()
    {
        return $this->duplicate;
    }

    public function setMapsUrl($mapsUrl)
    {
        $this->mapsUrl = $mapsUrl;
    }

    public function getMapsUrl()
    {
        return $this->mapsUrl;
    }

    public function setNewReviewUrl($newReviewUrl)
    {
        $this->newReviewUrl = $newReviewUrl;
    }

    public function getNewReviewUrl()
    {
        return $this->newReviewUrl;
    }
}

class Google_Service_MyBusiness_MetricRequest extends Collection
{
    protected $collection_key = 'options';
    protected $internal_gapi_mappings = array();
    public $metric;
    public $options;


    public function setMetric($metric)
    {
        $this->metric = $metric;
    }

    public function getMetric()
    {
        return $this->metric;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }
}

class Google_Service_MyBusiness_MetricValue extends Collection
{
    protected $collection_key = 'dimensionalValues';
    protected $internal_gapi_mappings = array();
    protected $dimensionalValuesType = 'Google_Service_MyBusiness_DimensionalMetricValue';
    protected $dimensionalValuesDataType = 'array';
    public $metric;
    protected $totalValueType = 'Google_Service_MyBusiness_DimensionalMetricValue';
    protected $totalValueDataType = '';


    public function setDimensionalValues($dimensionalValues)
    {
        $this->dimensionalValues = $dimensionalValues;
    }

    public function getDimensionalValues()
    {
        return $this->dimensionalValues;
    }

    public function setMetric($metric)
    {
        $this->metric = $metric;
    }

    public function getMetric()
    {
        return $this->metric;
    }

    public function setTotalValue(Google_Service_MyBusiness_DimensionalMetricValue $totalValue)
    {
        $this->totalValue = $totalValue;
    }

    public function getTotalValue()
    {
        return $this->totalValue;
    }
}

class Google_Service_MyBusiness_Money extends Model
{
    protected $internal_gapi_mappings = array();
    public $currencyCode;
    public $nanos;
    public $units;


    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function setNanos($nanos)
    {
        $this->nanos = $nanos;
    }

    public function getNanos()
    {
        return $this->nanos;
    }

    public function setUnits($units)
    {
        $this->units = $units;
    }

    public function getUnits()
    {
        return $this->units;
    }
}

class Google_Service_MyBusiness_MybusinessEmpty extends Model
{
}

class Google_Service_MyBusiness_Notifications extends Collection
{
    protected $collection_key = 'notificationTypes';
    protected $internal_gapi_mappings = array();
    public $name;
    public $notificationTypes;
    public $topicName;


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNotificationTypes($notificationTypes)
    {
        $this->notificationTypes = $notificationTypes;
    }

    public function getNotificationTypes()
    {
        return $this->notificationTypes;
    }

    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
    }

    public function getTopicName()
    {
        return $this->topicName;
    }
}

class Google_Service_MyBusiness_NutritionFact extends Model
{
    protected $internal_gapi_mappings = array();
    public $lowerAmount;
    public $unit;
    public $upperAmount;


    public function setLowerAmount($lowerAmount)
    {
        $this->lowerAmount = $lowerAmount;
    }

    public function getLowerAmount()
    {
        return $this->lowerAmount;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function setUpperAmount($upperAmount)
    {
        $this->upperAmount = $upperAmount;
    }

    public function getUpperAmount()
    {
        return $this->upperAmount;
    }
}

class Google_Service_MyBusiness_NutritionFacts extends Model
{
    protected $internal_gapi_mappings = array();
    protected $caloriesType = 'Google_Service_MyBusiness_CaloriesFact';
    protected $caloriesDataType = '';
    protected $cholesterolType = 'Google_Service_MyBusiness_NutritionFact';
    protected $cholesterolDataType = '';
    protected $proteinType = 'Google_Service_MyBusiness_NutritionFact';
    protected $proteinDataType = '';
    protected $sodiumType = 'Google_Service_MyBusiness_NutritionFact';
    protected $sodiumDataType = '';
    protected $totalCarbohydrateType = 'Google_Service_MyBusiness_NutritionFact';
    protected $totalCarbohydrateDataType = '';
    protected $totalFatType = 'Google_Service_MyBusiness_NutritionFact';
    protected $totalFatDataType = '';


    public function setCalories(Google_Service_MyBusiness_CaloriesFact $calories)
    {
        $this->calories = $calories;
    }

    public function getCalories()
    {
        return $this->calories;
    }

    public function setCholesterol(Google_Service_MyBusiness_NutritionFact $cholesterol)
    {
        $this->cholesterol = $cholesterol;
    }

    public function getCholesterol()
    {
        return $this->cholesterol;
    }

    public function setProtein(Google_Service_MyBusiness_NutritionFact $protein)
    {
        $this->protein = $protein;
    }

    public function getProtein()
    {
        return $this->protein;
    }

    public function setSodium(Google_Service_MyBusiness_NutritionFact $sodium)
    {
        $this->sodium = $sodium;
    }

    public function getSodium()
    {
        return $this->sodium;
    }

    public function setTotalCarbohydrate(Google_Service_MyBusiness_NutritionFact $totalCarbohydrate)
    {
        $this->totalCarbohydrate = $totalCarbohydrate;
    }

    public function getTotalCarbohydrate()
    {
        return $this->totalCarbohydrate;
    }

    public function setTotalFat(Google_Service_MyBusiness_NutritionFact $totalFat)
    {
        $this->totalFat = $totalFat;
    }

    public function getTotalFat()
    {
        return $this->totalFat;
    }
}

class Google_Service_MyBusiness_OpenInfo extends Model
{
    protected $internal_gapi_mappings = array();
    public $canReopen;
    protected $openingDateType = 'Google_Service_MyBusiness_Date';
    protected $openingDateDataType = '';
    public $status;


    public function setCanReopen($canReopen)
    {
        $this->canReopen = $canReopen;
    }

    public function getCanReopen()
    {
        return $this->canReopen;
    }

    public function setOpeningDate(Google_Service_MyBusiness_Date $openingDate)
    {
        $this->openingDate = $openingDate;
    }

    public function getOpeningDate()
    {
        return $this->openingDate;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}

class Google_Service_MyBusiness_OrganizationInfo extends Model
{
    protected $internal_gapi_mappings = array();
    public $phoneNumber;
    protected $postalAddressType = 'Google_Service_MyBusiness_PostalAddress';
    protected $postalAddressDataType = '';
    public $registeredDomain;


    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPostalAddress(Google_Service_MyBusiness_PostalAddress $postalAddress)
    {
        $this->postalAddress = $postalAddress;
    }

    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    public function setRegisteredDomain($registeredDomain)
    {
        $this->registeredDomain = $registeredDomain;
    }

    public function getRegisteredDomain()
    {
        return $this->registeredDomain;
    }
}

class Google_Service_MyBusiness_PhoneInput extends Model
{
    protected $internal_gapi_mappings = array();
    public $phoneNumber;


    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}

class Google_Service_MyBusiness_PhoneVerificationData extends Model
{
    protected $internal_gapi_mappings = array();
    public $phoneNumber;


    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}

class Google_Service_MyBusiness_PlaceInfo extends Model
{
    protected $internal_gapi_mappings = array();
    public $name;
    public $placeId;


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    public function getPlaceId()
    {
        return $this->placeId;
    }
}

class Google_Service_MyBusiness_Places extends Collection
{
    protected $collection_key = 'placeInfos';
    protected $internal_gapi_mappings = array();
    protected $placeInfosType = 'Google_Service_MyBusiness_PlaceInfo';
    protected $placeInfosDataType = 'array';


    public function setPlaceInfos($placeInfos)
    {
        $this->placeInfos = $placeInfos;
    }

    public function getPlaceInfos()
    {
        return $this->placeInfos;
    }
}

class Google_Service_MyBusiness_PointRadius extends Model
{
    protected $internal_gapi_mappings = array();
    protected $latlngType = 'Google_Service_MyBusiness_LatLng';
    protected $latlngDataType = '';
    public $radiusKm;


    public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
    {
        $this->latlng = $latlng;
    }

    public function getLatlng()
    {
        return $this->latlng;
    }

    public function setRadiusKm($radiusKm)
    {
        $this->radiusKm = $radiusKm;
    }

    public function getRadiusKm()
    {
        return $this->radiusKm;
    }
}

class Google_Service_MyBusiness_PortionSize extends Collection
{
    protected $collection_key = 'unit';
    protected $internal_gapi_mappings = array();
    public $quantity;
    protected $unitType = 'Google_Service_MyBusiness_MenuLabel';
    protected $unitDataType = 'array';


    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    public function getUnit()
    {
        return $this->unit;
    }
}

class Google_Service_MyBusiness_PostalAddress extends Collection
{
    protected $collection_key = 'recipients';
    protected $internal_gapi_mappings = array();
    public $addressLines;
    public $administrativeArea;
    public $languageCode;
    public $locality;
    public $organization;
    public $postalCode;
    public $recipients;
    public $regionCode;
    public $revision;
    public $sortingCode;
    public $sublocality;


    public function setAddressLines($addressLines)
    {
        $this->addressLines = $addressLines;
    }

    public function getAddressLines()
    {
        return $this->addressLines;
    }

    public function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;
    }

    public function getAdministrativeArea()
    {
        return $this->administrativeArea;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    public function getLocality()
    {
        return $this->locality;
    }

    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }

    public function getRecipients()
    {
        return $this->recipients;
    }

    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }

    public function getRegionCode()
    {
        return $this->regionCode;
    }

    public function setRevision($revision)
    {
        $this->revision = $revision;
    }

    public function getRevision()
    {
        return $this->revision;
    }

    public function setSortingCode($sortingCode)
    {
        $this->sortingCode = $sortingCode;
    }

    public function getSortingCode()
    {
        return $this->sortingCode;
    }

    public function setSublocality($sublocality)
    {
        $this->sublocality = $sublocality;
    }

    public function getSublocality()
    {
        return $this->sublocality;
    }
}

class Google_Service_MyBusiness_PriceList extends Collection
{
    protected $collection_key = 'sections';
    protected $internal_gapi_mappings = array();
    protected $labelsType = 'Google_Service_MyBusiness_Label';
    protected $labelsDataType = 'array';
    public $priceListId;
    protected $sectionsType = 'Google_Service_MyBusiness_Section';
    protected $sectionsDataType = 'array';
    public $sourceUrl;


    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setPriceListId($priceListId)
    {
        $this->priceListId = $priceListId;
    }

    public function getPriceListId()
    {
        return $this->priceListId;
    }

    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    public function getSections()
    {
        return $this->sections;
    }

    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;
    }

    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }
}

class Google_Service_MyBusiness_Profile extends Model
{
    protected $internal_gapi_mappings = array();
    public $description;


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}

class Google_Service_MyBusiness_Question extends Collection
{
    protected $collection_key = 'topAnswers';
    protected $internal_gapi_mappings = array();
    protected $authorType = 'Google_Service_MyBusiness_Author';
    protected $authorDataType = '';
    public $createTime;
    public $name;
    public $text;
    protected $topAnswersType = 'Google_Service_MyBusiness_Answer';
    protected $topAnswersDataType = 'array';
    public $totalAnswerCount;
    public $updateTime;
    public $upvoteCount;


    public function setAuthor(Google_Service_MyBusiness_Author $author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setTopAnswers($topAnswers)
    {
        $this->topAnswers = $topAnswers;
    }

    public function getTopAnswers()
    {
        return $this->topAnswers;
    }

    public function setTotalAnswerCount($totalAnswerCount)
    {
        $this->totalAnswerCount = $totalAnswerCount;
    }

    public function getTotalAnswerCount()
    {
        return $this->totalAnswerCount;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    public function setUpvoteCount($upvoteCount)
    {
        $this->upvoteCount = $upvoteCount;
    }

    public function getUpvoteCount()
    {
        return $this->upvoteCount;
    }
}

class Google_Service_MyBusiness_RegionCount extends Model
{
    protected $internal_gapi_mappings = array();
    public $count;
    public $label;
    protected $latlngType = 'Google_Service_MyBusiness_LatLng';
    protected $latlngDataType = '';


    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLatlng(Google_Service_MyBusiness_LatLng $latlng)
    {
        $this->latlng = $latlng;
    }

    public function getLatlng()
    {
        return $this->latlng;
    }
}

class Google_Service_MyBusiness_RelationshipData extends Model
{
    protected $internal_gapi_mappings = array();
    public $parentChain;


    public function setParentChain($parentChain)
    {
        $this->parentChain = $parentChain;
    }

    public function getParentChain()
    {
        return $this->parentChain;
    }
}

class Google_Service_MyBusiness_RepeatedEnumAttributeValue extends Collection
{
    protected $collection_key = 'unsetValues';
    protected $internal_gapi_mappings = array();
    public $setValues;
    public $unsetValues;


    public function setSetValues($setValues)
    {
        $this->setValues = $setValues;
    }

    public function getSetValues()
    {
        return $this->setValues;
    }

    public function setUnsetValues($unsetValues)
    {
        $this->unsetValues = $unsetValues;
    }

    public function getUnsetValues()
    {
        return $this->unsetValues;
    }
}

class Google_Service_MyBusiness_ReportGoogleLocationRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $locationGroupName;
    public $reportReasonBadLocation;
    public $reportReasonBadRecommendation;
    public $reportReasonElaboration;
    public $reportReasonLanguageCode;


    public function setLocationGroupName($locationGroupName)
    {
        $this->locationGroupName = $locationGroupName;
    }

    public function getLocationGroupName()
    {
        return $this->locationGroupName;
    }

    public function setReportReasonBadLocation($reportReasonBadLocation)
    {
        $this->reportReasonBadLocation = $reportReasonBadLocation;
    }

    public function getReportReasonBadLocation()
    {
        return $this->reportReasonBadLocation;
    }

    public function setReportReasonBadRecommendation($reportReasonBadRecommendation)
    {
        $this->reportReasonBadRecommendation = $reportReasonBadRecommendation;
    }

    public function getReportReasonBadRecommendation()
    {
        return $this->reportReasonBadRecommendation;
    }

    public function setReportReasonElaboration($reportReasonElaboration)
    {
        $this->reportReasonElaboration = $reportReasonElaboration;
    }

    public function getReportReasonElaboration()
    {
        return $this->reportReasonElaboration;
    }

    public function setReportReasonLanguageCode($reportReasonLanguageCode)
    {
        $this->reportReasonLanguageCode = $reportReasonLanguageCode;
    }

    public function getReportReasonLanguageCode()
    {
        return $this->reportReasonLanguageCode;
    }
}

class Google_Service_MyBusiness_ReportLocalPostInsightsRequest extends Collection
{
    protected $collection_key = 'localPostNames';
    protected $internal_gapi_mappings = array();
    protected $basicRequestType = 'Google_Service_MyBusiness_BasicMetricsRequest';
    protected $basicRequestDataType = '';
    public $localPostNames;


    public function setBasicRequest(Google_Service_MyBusiness_BasicMetricsRequest $basicRequest)
    {
        $this->basicRequest = $basicRequest;
    }

    public function getBasicRequest()
    {
        return $this->basicRequest;
    }

    public function setLocalPostNames($localPostNames)
    {
        $this->localPostNames = $localPostNames;
    }

    public function getLocalPostNames()
    {
        return $this->localPostNames;
    }
}

class Google_Service_MyBusiness_ReportLocalPostInsightsResponse extends Collection
{
    protected $collection_key = 'localPostMetrics';
    protected $internal_gapi_mappings = array();
    protected $localPostMetricsType = 'Google_Service_MyBusiness_LocalPostMetrics';
    protected $localPostMetricsDataType = 'array';
    public $name;
    public $timeZone;


    public function setLocalPostMetrics($localPostMetrics)
    {
        $this->localPostMetrics = $localPostMetrics;
    }

    public function getLocalPostMetrics()
    {
        return $this->localPostMetrics;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }
}

class Google_Service_MyBusiness_ReportLocationInsightsRequest extends Collection
{
    protected $collection_key = 'locationNames';
    protected $internal_gapi_mappings = array();
    protected $basicRequestType = 'Google_Service_MyBusiness_BasicMetricsRequest';
    protected $basicRequestDataType = '';
    protected $drivingDirectionsRequestType = 'Google_Service_MyBusiness_DrivingDirectionMetricsRequest';
    protected $drivingDirectionsRequestDataType = '';
    public $locationNames;


    public function setBasicRequest(Google_Service_MyBusiness_BasicMetricsRequest $basicRequest)
    {
        $this->basicRequest = $basicRequest;
    }

    public function getBasicRequest()
    {
        return $this->basicRequest;
    }

    public function setDrivingDirectionsRequest(Google_Service_MyBusiness_DrivingDirectionMetricsRequest $drivingDirectionsRequest)
    {
        $this->drivingDirectionsRequest = $drivingDirectionsRequest;
    }

    public function getDrivingDirectionsRequest()
    {
        return $this->drivingDirectionsRequest;
    }

    public function setLocationNames($locationNames)
    {
        $this->locationNames = $locationNames;
    }

    public function getLocationNames()
    {
        return $this->locationNames;
    }
}

class Google_Service_MyBusiness_ReportLocationInsightsResponse extends Collection
{
    protected $collection_key = 'locationMetrics';
    protected $internal_gapi_mappings = array();
    protected $locationDrivingDirectionMetricsType = 'Google_Service_MyBusiness_LocationDrivingDirectionMetrics';
    protected $locationDrivingDirectionMetricsDataType = 'array';
    protected $locationMetricsType = 'Google_Service_MyBusiness_LocationMetrics';
    protected $locationMetricsDataType = 'array';


    public function setLocationDrivingDirectionMetrics($locationDrivingDirectionMetrics)
    {
        $this->locationDrivingDirectionMetrics = $locationDrivingDirectionMetrics;
    }

    public function getLocationDrivingDirectionMetrics()
    {
        return $this->locationDrivingDirectionMetrics;
    }

    public function setLocationMetrics($locationMetrics)
    {
        $this->locationMetrics = $locationMetrics;
    }

    public function getLocationMetrics()
    {
        return $this->locationMetrics;
    }
}

class Google_Service_MyBusiness_Review extends Model
{
    protected $internal_gapi_mappings = array();
    public $comment;
    public $createTime;
    public $name;
    public $reviewId;
    protected $reviewReplyType = 'Google_Service_MyBusiness_ReviewReply';
    protected $reviewReplyDataType = '';
    protected $reviewerType = 'Google_Service_MyBusiness_Reviewer';
    protected $reviewerDataType = '';
    public $starRating;
    public $updateTime;


    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setReviewId($reviewId)
    {
        $this->reviewId = $reviewId;
    }

    public function getReviewId()
    {
        return $this->reviewId;
    }

    public function setReviewReply(Google_Service_MyBusiness_ReviewReply $reviewReply)
    {
        $this->reviewReply = $reviewReply;
    }

    public function getReviewReply()
    {
        return $this->reviewReply;
    }

    public function setReviewer(Google_Service_MyBusiness_Reviewer $reviewer)
    {
        $this->reviewer = $reviewer;
    }

    public function getReviewer()
    {
        return $this->reviewer;
    }

    public function setStarRating($starRating)
    {
        $this->starRating = $starRating;
    }

    public function getStarRating()
    {
        return $this->starRating;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}

class Google_Service_MyBusiness_ReviewReply extends Model
{
    protected $internal_gapi_mappings = array();
    public $comment;
    public $updateTime;


    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}

class Google_Service_MyBusiness_Reviewer extends Model
{
    protected $internal_gapi_mappings = array();
    public $displayName;
    public $isAnonymous;
    public $profilePhotoUrl;


    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setIsAnonymous($isAnonymous)
    {
        $this->isAnonymous = $isAnonymous;
    }

    public function getIsAnonymous()
    {
        return $this->isAnonymous;
    }

    public function setProfilePhotoUrl($profilePhotoUrl)
    {
        $this->profilePhotoUrl = $profilePhotoUrl;
    }

    public function getProfilePhotoUrl()
    {
        return $this->profilePhotoUrl;
    }
}

class Google_Service_MyBusiness_SearchChainsResponse extends Collection
{
    protected $collection_key = 'chains';
    protected $internal_gapi_mappings = array();
    protected $chainsType = 'Google_Service_MyBusiness_Chain';
    protected $chainsDataType = 'array';


    public function setChains($chains)
    {
        $this->chains = $chains;
    }

    public function getChains()
    {
        return $this->chains;
    }
}

class Google_Service_MyBusiness_SearchGoogleLocationsRequest extends Model
{
    protected $internal_gapi_mappings = array();
    protected $locationType = 'Google_Service_MyBusiness_Location';
    protected $locationDataType = '';
    public $query;
    public $resultCount;


    public function setLocation(Google_Service_MyBusiness_Location $location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setResultCount($resultCount)
    {
        $this->resultCount = $resultCount;
    }

    public function getResultCount()
    {
        return $this->resultCount;
    }
}

class Google_Service_MyBusiness_SearchGoogleLocationsResponse extends Collection
{
    protected $collection_key = 'googleLocations';
    protected $internal_gapi_mappings = array();
    protected $googleLocationsType = 'Google_Service_MyBusiness_GoogleLocation';
    protected $googleLocationsDataType = 'array';


    public function setGoogleLocations($googleLocations)
    {
        $this->googleLocations = $googleLocations;
    }

    public function getGoogleLocations()
    {
        return $this->googleLocations;
    }
}

class Google_Service_MyBusiness_Section extends Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = array();
    protected $itemsType = 'Google_Service_MyBusiness_Item';
    protected $itemsDataType = 'array';
    protected $labelsType = 'Google_Service_MyBusiness_Label';
    protected $labelsDataType = 'array';
    public $sectionId;
    public $sectionType;


    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;
    }

    public function getSectionId()
    {
        return $this->sectionId;
    }

    public function setSectionType($sectionType)
    {
        $this->sectionType = $sectionType;
    }

    public function getSectionType()
    {
        return $this->sectionType;
    }
}

class Google_Service_MyBusiness_ServiceAreaBusiness extends Model
{
    protected $internal_gapi_mappings = array();
    public $businessType;
    protected $placesType = 'Google_Service_MyBusiness_Places';
    protected $placesDataType = '';
    protected $radiusType = 'Google_Service_MyBusiness_PointRadius';
    protected $radiusDataType = '';


    public function setBusinessType($businessType)
    {
        $this->businessType = $businessType;
    }

    public function getBusinessType()
    {
        return $this->businessType;
    }

    public function setPlaces(Google_Service_MyBusiness_Places $places)
    {
        $this->places = $places;
    }

    public function getPlaces()
    {
        return $this->places;
    }

    public function setRadius(Google_Service_MyBusiness_PointRadius $radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }
}

class Google_Service_MyBusiness_ServiceBusinessContext extends Model
{
    protected $internal_gapi_mappings = array();
    protected $addressType = 'Google_Service_MyBusiness_PostalAddress';
    protected $addressDataType = '';


    public function setAddress(Google_Service_MyBusiness_PostalAddress $address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

class Google_Service_MyBusiness_ServiceItem extends Model
{
    protected $internal_gapi_mappings = array();
    protected $freeFormServiceItemType = 'Google_Service_MyBusiness_FreeFormServiceItem';
    protected $freeFormServiceItemDataType = '';
    public $isOffered;
    protected $priceType = 'Google_Service_MyBusiness_Money';
    protected $priceDataType = '';
    protected $structuredServiceItemType = 'Google_Service_MyBusiness_StructuredServiceItem';
    protected $structuredServiceItemDataType = '';


    public function setFreeFormServiceItem(Google_Service_MyBusiness_FreeFormServiceItem $freeFormServiceItem)
    {
        $this->freeFormServiceItem = $freeFormServiceItem;
    }

    public function getFreeFormServiceItem()
    {
        return $this->freeFormServiceItem;
    }

    public function setIsOffered($isOffered)
    {
        $this->isOffered = $isOffered;
    }

    public function getIsOffered()
    {
        return $this->isOffered;
    }

    public function setPrice(Google_Service_MyBusiness_Money $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setStructuredServiceItem(Google_Service_MyBusiness_StructuredServiceItem $structuredServiceItem)
    {
        $this->structuredServiceItem = $structuredServiceItem;
    }

    public function getStructuredServiceItem()
    {
        return $this->structuredServiceItem;
    }
}

class Google_Service_MyBusiness_ServiceList extends Collection
{
    protected $collection_key = 'serviceItems';
    protected $internal_gapi_mappings = array();
    public $name;
    protected $serviceItemsType = 'Google_Service_MyBusiness_ServiceItem';
    protected $serviceItemsDataType = 'array';


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setServiceItems($serviceItems)
    {
        $this->serviceItems = $serviceItems;
    }

    public function getServiceItems()
    {
        return $this->serviceItems;
    }
}

class Google_Service_MyBusiness_ServiceType extends Model
{
    protected $internal_gapi_mappings = array();
    public $displayName;
    public $serviceTypeId;


    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setServiceTypeId($serviceTypeId)
    {
        $this->serviceTypeId = $serviceTypeId;
    }

    public function getServiceTypeId()
    {
        return $this->serviceTypeId;
    }
}

class Google_Service_MyBusiness_SpecialHourPeriod extends Model
{
    protected $internal_gapi_mappings = array();
    public $closeTime;
    protected $endDateType = 'Google_Service_MyBusiness_Date';
    protected $endDateDataType = '';
    public $isClosed;
    public $openTime;
    protected $startDateType = 'Google_Service_MyBusiness_Date';
    protected $startDateDataType = '';


    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    public function getCloseTime()
    {
        return $this->closeTime;
    }

    public function setEndDate(Google_Service_MyBusiness_Date $endDate)
    {
        $this->endDate = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    public function getIsClosed()
    {
        return $this->isClosed;
    }

    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
    }

    public function getOpenTime()
    {
        return $this->openTime;
    }

    public function setStartDate(Google_Service_MyBusiness_Date $startDate)
    {
        $this->startDate = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }
}

class Google_Service_MyBusiness_SpecialHours extends Collection
{
    protected $collection_key = 'specialHourPeriods';
    protected $internal_gapi_mappings = array();
    protected $specialHourPeriodsType = 'Google_Service_MyBusiness_SpecialHourPeriod';
    protected $specialHourPeriodsDataType = 'array';


    public function setSpecialHourPeriods($specialHourPeriods)
    {
        $this->specialHourPeriods = $specialHourPeriods;
    }

    public function getSpecialHourPeriods()
    {
        return $this->specialHourPeriods;
    }
}

class Google_Service_MyBusiness_StartUploadMediaItemDataRequest extends Model
{
}

class Google_Service_MyBusiness_StructuredServiceItem extends Model
{
    protected $internal_gapi_mappings = array();
    public $description;
    public $serviceTypeId;


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setServiceTypeId($serviceTypeId)
    {
        $this->serviceTypeId = $serviceTypeId;
    }

    public function getServiceTypeId()
    {
        return $this->serviceTypeId;
    }
}

class Google_Service_MyBusiness_TargetLocation extends Model
{
    protected $internal_gapi_mappings = array();
    public $locationAddress;
    public $locationName;


    public function setLocationAddress($locationAddress)
    {
        $this->locationAddress = $locationAddress;
    }

    public function getLocationAddress()
    {
        return $this->locationAddress;
    }

    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getLocationName()
    {
        return $this->locationName;
    }
}

class Google_Service_MyBusiness_TimeDimension extends Model
{
    protected $internal_gapi_mappings = array();
    public $dayOfWeek;
    protected $timeOfDayType = 'Google_Service_MyBusiness_TimeOfDay';
    protected $timeOfDayDataType = '';
    protected $timeRangeType = 'Google_Service_MyBusiness_TimeRange';
    protected $timeRangeDataType = '';


    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    public function setTimeOfDay(Google_Service_MyBusiness_TimeOfDay $timeOfDay)
    {
        $this->timeOfDay = $timeOfDay;
    }

    public function getTimeOfDay()
    {
        return $this->timeOfDay;
    }

    public function setTimeRange(Google_Service_MyBusiness_TimeRange $timeRange)
    {
        $this->timeRange = $timeRange;
    }

    public function getTimeRange()
    {
        return $this->timeRange;
    }
}

class Google_Service_MyBusiness_TimeInterval extends Model
{
    protected $internal_gapi_mappings = array();
    protected $endDateType = 'Google_Service_MyBusiness_Date';
    protected $endDateDataType = '';
    protected $endTimeType = 'Google_Service_MyBusiness_TimeOfDay';
    protected $endTimeDataType = '';
    protected $startDateType = 'Google_Service_MyBusiness_Date';
    protected $startDateDataType = '';
    protected $startTimeType = 'Google_Service_MyBusiness_TimeOfDay';
    protected $startTimeDataType = '';


    public function setEndDate(Google_Service_MyBusiness_Date $endDate)
    {
        $this->endDate = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndTime(Google_Service_MyBusiness_TimeOfDay $endTime)
    {
        $this->endTime = $endTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setStartDate(Google_Service_MyBusiness_Date $startDate)
    {
        $this->startDate = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartTime(Google_Service_MyBusiness_TimeOfDay $startTime)
    {
        $this->startTime = $startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }
}

class Google_Service_MyBusiness_TimeOfDay extends Model
{
    protected $internal_gapi_mappings = array();
    public $hours;
    public $minutes;
    public $nanos;
    public $seconds;


    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    }

    public function getMinutes()
    {
        return $this->minutes;
    }

    public function setNanos($nanos)
    {
        $this->nanos = $nanos;
    }

    public function getNanos()
    {
        return $this->nanos;
    }

    public function setSeconds($seconds)
    {
        $this->seconds = $seconds;
    }

    public function getSeconds()
    {
        return $this->seconds;
    }
}

class Google_Service_MyBusiness_TimePeriod extends Model
{
    protected $internal_gapi_mappings = array();
    public $closeDay;
    public $closeTime;
    public $openDay;
    public $openTime;


    public function setCloseDay($closeDay)
    {
        $this->closeDay = $closeDay;
    }

    public function getCloseDay()
    {
        return $this->closeDay;
    }

    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    public function getCloseTime()
    {
        return $this->closeTime;
    }

    public function setOpenDay($openDay)
    {
        $this->openDay = $openDay;
    }

    public function getOpenDay()
    {
        return $this->openDay;
    }

    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
    }

    public function getOpenTime()
    {
        return $this->openTime;
    }
}

class Google_Service_MyBusiness_TimeRange extends Model
{
    protected $internal_gapi_mappings = array();
    public $endTime;
    public $startTime;


    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }
}

class Google_Service_MyBusiness_TopDirectionSources extends Collection
{
    protected $collection_key = 'regionCounts';
    protected $internal_gapi_mappings = array();
    public $dayCount;
    protected $regionCountsType = 'Google_Service_MyBusiness_RegionCount';
    protected $regionCountsDataType = 'array';


    public function setDayCount($dayCount)
    {
        $this->dayCount = $dayCount;
    }

    public function getDayCount()
    {
        return $this->dayCount;
    }

    public function setRegionCounts($regionCounts)
    {
        $this->regionCounts = $regionCounts;
    }

    public function getRegionCounts()
    {
        return $this->regionCounts;
    }
}

class Google_Service_MyBusiness_TransferLocationRequest extends Model
{
    protected $internal_gapi_mappings = array();
    public $toAccount;


    public function setToAccount($toAccount)
    {
        $this->toAccount = $toAccount;
    }

    public function getToAccount()
    {
        return $this->toAccount;
    }
}

class Google_Service_MyBusiness_UpsertAnswerRequest extends Model
{
    protected $internal_gapi_mappings = array();
    protected $answerType = 'Google_Service_MyBusiness_Answer';
    protected $answerDataType = '';


    public function setAnswer(Google_Service_MyBusiness_Answer $answer)
    {
        $this->answer = $answer;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}

class Google_Service_MyBusiness_UrlAttributeValue extends Model
{
    protected $internal_gapi_mappings = array();
    public $url;


    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}

class Google_Service_MyBusiness_Verification extends Model
{
    protected $internal_gapi_mappings = array();
    public $createTime;
    public $method;
    public $name;
    public $state;


    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}

class Google_Service_MyBusiness_VerificationOption extends Model
{
    protected $internal_gapi_mappings = array();
    protected $addressDataType = 'Google_Service_MyBusiness_AddressVerificationData';
    protected $addressDataDataType = '';
    protected $emailDataType = 'Google_Service_MyBusiness_EmailVerificationData';
    protected $emailDataDataType = '';
    protected $phoneDataType = 'Google_Service_MyBusiness_PhoneVerificationData';
    protected $phoneDataDataType = '';
    public $verificationMethod;


    public function setAddressData(Google_Service_MyBusiness_AddressVerificationData $addressData)
    {
        $this->addressData = $addressData;
    }

    public function getAddressData()
    {
        return $this->addressData;
    }

    public function setEmailData(Google_Service_MyBusiness_EmailVerificationData $emailData)
    {
        $this->emailData = $emailData;
    }

    public function getEmailData()
    {
        return $this->emailData;
    }

    public function setPhoneData(Google_Service_MyBusiness_PhoneVerificationData $phoneData)
    {
        $this->phoneData = $phoneData;
    }

    public function getPhoneData()
    {
        return $this->phoneData;
    }

    public function setVerificationMethod($verificationMethod)
    {
        $this->verificationMethod = $verificationMethod;
    }

    public function getVerificationMethod()
    {
        return $this->verificationMethod;
    }
}

class Google_Service_MyBusiness_VerifyLocationRequest extends Model
{
    protected $internal_gapi_mappings = array();
    protected $addressInputType = 'Google_Service_MyBusiness_AddressInput';
    protected $addressInputDataType = '';
    protected $contextType = 'Google_Service_MyBusiness_ServiceBusinessContext';
    protected $contextDataType = '';
    protected $emailInputType = 'Google_Service_MyBusiness_EmailInput';
    protected $emailInputDataType = '';
    public $languageCode;
    public $method;
    protected $phoneInputType = 'Google_Service_MyBusiness_PhoneInput';
    protected $phoneInputDataType = '';


    public function setAddressInput(Google_Service_MyBusiness_AddressInput $addressInput)
    {
        $this->addressInput = $addressInput;
    }

    public function getAddressInput()
    {
        return $this->addressInput;
    }

    public function setContext(Google_Service_MyBusiness_ServiceBusinessContext $context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setEmailInput(Google_Service_MyBusiness_EmailInput $emailInput)
    {
        $this->emailInput = $emailInput;
    }

    public function getEmailInput()
    {
        return $this->emailInput;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setPhoneInput(Google_Service_MyBusiness_PhoneInput $phoneInput)
    {
        $this->phoneInput = $phoneInput;
    }

    public function getPhoneInput()
    {
        return $this->phoneInput;
    }
}

class Google_Service_MyBusiness_VerifyLocationResponse extends Model
{
    protected $internal_gapi_mappings = array();
    protected $verificationType = 'Google_Service_MyBusiness_Verification';
    protected $verificationDataType = '';


    public function setVerification(Google_Service_MyBusiness_Verification $verification)
    {
        $this->verification = $verification;
    }

    public function getVerification()
    {
        return $this->verification;
    }
}

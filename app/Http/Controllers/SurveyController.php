<?php

namespace App\Http\Controllers;

use Exception;
use App\Helpers\ApiHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubmitSurveyFormRequest;

class SurveyController extends Controller
{
    public function showSurveyForm()
    {
        return view('forms.survey-form');
    }

    public function submitSurveyForm(SubmitSurveyFormRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'company' => $request->company,
                'designation' => $request->designation,
            ];
            $response = ApiHelper::httpPost('/user/register', $data);

            if (isset($response['user']) && $response['user']) {
                $tokenResponse = ApiHelper::httpGet('/user/generate-token');

                if (isset($tokenResponse['token'])) {
                    Session::flash('token', $tokenResponse['token']);
                    return redirect()->route('generated.token')->with('success', 'Token generated successfully');
                } else {
                    return redirect()->route('survey.form')->withInput($data)->with('error', 'Failed to generate token');
                }
            } else {
                $errors = $response['errors'];
                return redirect()->route('survey.form')->withInput($data)->with('apiErrors', $errors);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('survey.form')->withInput($data)->with('error', 'An error occurred');
        }
    }

    public function showGeneratedToken()
    {
        if (Session::has('token')) {
            return view('forms.generated-token')->with('token', Session::get('token'));
        } else {
            return redirect()->route('survey.form');
        }
    }
}

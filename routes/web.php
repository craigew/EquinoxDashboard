<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('sitegraph', 'SitegraphController@index');

Route::get('levelgraph', 'LevelgraphController@index');




//APIs
Route::get('results', 'ResultsController@index');

Route::get('results/site/{site}', 'ResultsController@returnBySite');

Route::get('results/level/{level}', 'ResultsController@returnByLevel');

Route::get('results/site/{site}/level/{level}', 'ResultsController@returnBySiteAndLevel');

Route::get('results/question/{id}', 'ResultsController@returnQuestion');

Route::get('results/question/{id}/site/{site}', 'ResultsController@returnQuestionForSite');
Route::get('results/question/{id}/level/{level}', 'ResultsController@returnQuestionForLevel');
Route::get('results/question/{id}/site/{site}/level/{level}', 'ResultsController@returnQuestionForSiteAndLevel');

Route::get('results/engagement', 'ResultsController@returnEngagement');
Route::get('results/engagement/site/{site}', 'ResultsController@returnEngagementForSite');
Route::get('results/engagement/level/{level}', 'ResultsController@returnEngagementForLevel');
Route::get('results/engagement/site/{site}/level/{level}', 'ResultsController@returnEngagementForSiteAndLevel');

Route::get('results/teamwork', 'ResultsController@returnTeamwork');
Route::get('results/teamwork/site/{site}', 'ResultsController@returnTeamworkForSite');
Route::get('results/teamwork/level/{level}', 'ResultsController@returnTeamworkForLevel');
Route::get('results/teamwork/site/{site}/level/{level}', 'ResultsController@returnTeamworkForSiteAndLevel');

Route::get('results/meaning', 'ResultsController@returnMeaning');
Route::get('results/meaning/site/{site}', 'ResultsController@returnMeaningForSite');
Route::get('results/meaning/level/{level}', 'ResultsController@returnMeaningForLevel');
Route::get('results/meaning/site/{site}/level/{level}', 'ResultsController@returnMeaningForSiteAndLevel');

Route::get('results/recognition', 'ResultsController@returnRecognition');
Route::get('results/recognition/site/{site}', 'ResultsController@returnRecognitionForSite');
Route::get('results/recognition/level/{level}', 'ResultsController@returnRecognitionForLevel');
Route::get('results/recognition/site/{site}/level/{level}', 'ResultsController@returnRecognitionForSiteAndLevel');

Route::get('results/leadership', 'ResultsController@returnLeadership');
Route::get('results/leadership/site/{site}', 'ResultsController@returnLeadershipForSite');
Route::get('results/leadership/level/{level}', 'ResultsController@returnLeadershipForLevel');
Route::get('results/leadership/site/{site}/level/{level}', 'ResultsController@returnLeadershipForSiteAndLevel');

Route::get('results/superior', 'ResultsController@returnSuperior');
Route::get('results/superior/site/{site}', 'ResultsController@returnSuperiorForSite');
Route::get('results/superior/level/{level}', 'ResultsController@returnSuperiorForLevel');
Route::get('results/superior/site/{site}/level/{level}', 'ResultsController@returnSuperiorForSiteAndLevel');

Route::get('results/communication', 'ResultsController@returnCommunication');
Route::get('results/communication/site/{site}', 'ResultsController@returnCommunicationForSite');
Route::get('results/communication/level/{level}', 'ResultsController@returnCommunicationForLevel');
Route::get('results/communication/site/{site}/level/{level}', 'ResultsController@returnCommunicationForSiteAndLevel');

Route::get('results/learning', 'ResultsController@returnLearning');
Route::get('results/learning/site/{site}', 'ResultsController@returnLearningForSite');
Route::get('results/learning/level/{level}', 'ResultsController@returnLearningForLevel');
Route::get('results/learning/site/{site}/level/{level}', 'ResultsController@returnLearningForSiteAndLevel');

Route::get('results/job', 'ResultsController@returnJob');
Route::get('results/job/site/{site}', 'ResultsController@returnJobForSite');
Route::get('results/job/level/{level}', 'ResultsController@returnJobForLevel');
Route::get('results/job/site/{site}/level/{level}', 'ResultsController@returnJobForSiteAndLevel');

Route::get('results/average/engagement/{site}', 'ResultsController@returnAverageDataForEngagement');
Route::get('results/average/teamwork/{site}', 'ResultsController@returnAverageDataForTeamwork');
Route::get('results/average/meaning/{site}', 'ResultsController@returnAverageDataForMeaning');
Route::get('results/average/recognition/{site}', 'ResultsController@returnAverageDataForRecognition');
Route::get('results/average/leadership/{site}', 'ResultsController@returnAverageDataForLeadership');
Route::get('results/average/superior/{site}', 'ResultsController@returnAverageDataForSuperior');
Route::get('results/average/communication/{site}', 'ResultsController@returnAverageDataForCommunication');
Route::get('results/average/learning/{site}', 'ResultsController@returnAverageDataForLearning');
Route::get('results/average/job/{site}', 'ResultsController@returnAverageDataForJob');

Route::get('results/levelaverage/site/{site}/question/{question}', 'ResultsController@returnAverageDataForLevels');

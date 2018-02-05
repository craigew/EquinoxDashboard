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

Route::get('sitesgraph', 'SitesgraphController@index');




//APIs
Route::get('results', 'ResultsController@index');

Route::get('results/client/{client}/site/{site}', 'ResultsController@returnBySite');

Route::get('results/client/{client}/level/{level}', 'ResultsController@returnByLevel');

Route::get('results/client/{client}/site/{site}/level/{level}', 'ResultsController@returnBySiteAndLevel');

Route::get('results/client/{client}/question/{id}', 'ResultsController@returnQuestion');

Route::get('results/client/{client}/question/{id}/site/{site}', 'ResultsController@returnQuestionForSite');
Route::get('results/client/{client}/question/{id}/level/{level}', 'ResultsController@returnQuestionForLevel');
Route::get('results/client/{client}/question/{id}/site/{site}/level/{level}', 'ResultsController@returnQuestionForSiteAndLevel');

/* Result Comparison */
Route::get('results/question/{id}', 'ResultsController@averageComparisonQuestion');
Route::get('results/question/{id}/level/{level}', 'ResultsController@averageComparisonLevel');
Route::get('results/question/{id}/site/{site}', 'ResultsController@averageComparisonSite');
Route::get('results/question/{id}/site/{site}/level/{level}', 'ResultsController@averageComparisonSiteAndLevel');

Route::get('results/comparison/question/engagement', 'ResultsController@averageComparisonEngagement');
Route::get('results/comparison/question/engagement/site/{site}', 'ResultsController@averageComparisonEngagementSite');
Route::get('results/comparison/question/engagement/level/{level}', 'ResultsController@averageComparisonEngagementLevel');
Route::get('results/comparison/question/engagement/site/{site}/level/{level}', 'ResultsController@averageComparisonEngagementSiteAndLevel');

Route::get('results/comparison/question/teamwork', 'ResultsController@averageComparisonTeamwork');
Route::get('results/comparison/question/teamwork/site/{site}', 'ResultsController@averageComparisonTeamworkSite');
Route::get('results/comparison/question/teamwork/level/{level}', 'ResultsController@averageComparisonTeamworkLevel');
Route::get('results/comparison/question/teamwork/site/{site}/level/{level}', 'ResultsController@averageComparisonTeamworkSiteAndLevel');

Route::get('results/comparison/question/meaning', 'ResultsController@averageComparisonMeaning');
Route::get('results/comparison/question/meaning/site/{site}', 'ResultsController@averageComparisonMeaningSite');
Route::get('results/comparison/question/meaning/level/{level}', 'ResultsController@averageComparisonMeaningLevel');
Route::get('results/comparison/question/meaning/site/{site}/level/{level}', 'ResultsController@averageComparisonMeaningSiteAndLevel');

Route::get('results/comparison/question/recognition', 'ResultsController@averageComparisonRecognition');
Route::get('results/comparison/question/recognition/site/{site}', 'ResultsController@averageComparisonRecognitionSite');
Route::get('results/comparison/question/recognition/level/{level}', 'ResultsController@averageComparisonRecognitionLevel');
Route::get('results/comparison/question/recognition/site/{site}/level/{level}', 'ResultsController@averageComparisonRecognitionSiteAndLevel');

Route::get('results/comparison/question/superior', 'ResultsController@averageComparisonSuperior');
Route::get('results/comparison/question/superior/site/{site}', 'ResultsController@averageComparisonSuperiorSite');
Route::get('results/comparison/question/superior/level/{level}', 'ResultsController@averageComparisonSuperiorLevel');
Route::get('results/comparison/question/superior/site/{site}/level/{level}', 'ResultsController@averageComparisonSuperiorSiteAndLevel');

Route::get('results/comparison/question/leadership', 'ResultsController@averageComparisonLeadership');
Route::get('results/comparison/question/leadership/site/{site}', 'ResultsController@averageComparisonLeadershipSite');
Route::get('results/comparison/question/leadership/level/{level}', 'ResultsController@averageComparisonLeadershipLevel');
Route::get('results/comparison/question/leadership/site/{site}/level/{level}', 'ResultsController@averageComparisonLeadershipSiteAndLevel');

Route::get('results/comparison/question/communication', 'ResultsController@averageComparisonCommunication');
Route::get('results/comparison/question/communication/site/{site}', 'ResultsController@averageComparisonCommunicationSite');
Route::get('results/comparison/question/communication/level/{level}', 'ResultsController@averageComparisonCommunicationLevel');
Route::get('results/comparison/question/communication/site/{site}/level/{level}', 'ResultsController@averageComparisonCommunicationSiteAndLevel');

Route::get('results/comparison/question/learning', 'ResultsController@averageComparisonLeaning');
Route::get('results/comparison/question/learning/site/{site}', 'ResultsController@averageComparisonLeaningSite');
Route::get('results/comparison/question/learning/level/{level}', 'ResultsController@averageComparisonLeaningLevel');
Route::get('results/comparison/question/learning/site/{site}/level/{level}', 'ResultsController@averageComparisonLeaningSiteAndLevel');

Route::get('results/comparison/question/job', 'ResultsController@averageComparisonJob');
Route::get('results/comparison/question/job/site/{site}', 'ResultsController@averageComparisonJobSite');
Route::get('results/comparison/question/job/level/{level}', 'ResultsController@averageComparisonJobLevel');
Route::get('results/comparison/question/job/site/{site}/level/{level}', 'ResultsController@averageComparisonJobSiteAndLevel');

Route::get('results/client/{client}/engagement', 'ResultsController@returnEngagement');
Route::get('results/client/{client}/engagement/site/{site}', 'ResultsController@returnEngagementForSite');
Route::get('results/client/{client}/engagement/level/{level}', 'ResultsController@returnEngagementForLevel');
Route::get('results/client/{client}/engagement/site/{site}/level/{level}', 'ResultsController@returnEngagementForSiteAndLevel');

Route::get('results/client/{client}/teamwork', 'ResultsController@returnTeamwork');
Route::get('results/client/{client}/teamwork/site/{site}', 'ResultsController@returnTeamworkForSite');
Route::get('results/client/{client}/teamwork/level/{level}', 'ResultsController@returnTeamworkForLevel');
Route::get('results/client/{client}/teamwork/site/{site}/level/{level}', 'ResultsController@returnTeamworkForSiteAndLevel');

Route::get('results/client/{client}/strategy', 'ResultsController@returnStrategy');
Route::get('results/client/{client}/strategy/site/{site}', 'ResultsController@returnStrategyForSite');
Route::get('results/client/{client}/strategy/level/{level}', 'ResultsController@returnStrategyForLevel');
Route::get('results/client/{client}/strategy/site/{site}/level/{level}', 'ResultsController@returnStrategyForSiteAndLevel');

Route::get('results/client/{client}/meaning', 'ResultsController@returnMeaning');
Route::get('results/client/{client}/meaning/site/{site}', 'ResultsController@returnMeaningForSite');
Route::get('results/client/{client}/meaning/level/{level}', 'ResultsController@returnMeaningForLevel');
Route::get('results/client/{client}/meaning/site/{site}/level/{level}', 'ResultsController@returnMeaningForSiteAndLevel');

Route::get('results/client/{client}/recognition', 'ResultsController@returnRecognition');
Route::get('results/client/{client}/recognition/site/{site}', 'ResultsController@returnRecognitionForSite');
Route::get('results/client/{client}/recognition/level/{level}', 'ResultsController@returnRecognitionForLevel');
Route::get('results/client/{client}/recognition/site/{site}/level/{level}', 'ResultsController@returnRecognitionForSiteAndLevel');

Route::get('results/client/{client}/leadership', 'ResultsController@returnLeadership');
Route::get('results/client/{client}/leadership/site/{site}', 'ResultsController@returnLeadershipForSite');
Route::get('results/client/{client}/leadership/level/{level}', 'ResultsController@returnLeadershipForLevel');
Route::get('results/client/{client}/leadership/site/{site}/level/{level}', 'ResultsController@returnLeadershipForSiteAndLevel');

Route::get('results/client/{client}/superior', 'ResultsController@returnSuperior');
Route::get('results/client/{client}/superior/site/{site}', 'ResultsController@returnSuperiorForSite');
Route::get('results/client/{client}/superior/level/{level}', 'ResultsController@returnSuperiorForLevel');
Route::get('results/client/{client}/superior/site/{site}/level/{level}', 'ResultsController@returnSuperiorForSiteAndLevel');

Route::get('results/client/{client}/communication', 'ResultsController@returnCommunication');
Route::get('results/client/{client}/communication/site/{site}', 'ResultsController@returnCommunicationForSite');
Route::get('results/client/{client}/communication/level/{level}', 'ResultsController@returnCommunicationForLevel');
Route::get('results/client/{client}/communication/site/{site}/level/{level}', 'ResultsController@returnCommunicationForSiteAndLevel');

Route::get('results/client/{client}/learning', 'ResultsController@returnLearning');
Route::get('results/client/{client}/learning/site/{site}', 'ResultsController@returnLearningForSite');
Route::get('results/client/{client}/learning/level/{level}', 'ResultsController@returnLearningForLevel');
Route::get('results/client/{client}/learning/site/{site}/level/{level}', 'ResultsController@returnLearningForSiteAndLevel');

Route::get('results/client/{client}/job', 'ResultsController@returnJob');
Route::get('results/client/{client}/job/site/{site}', 'ResultsController@returnJobForSite');
Route::get('results/client/{client}/job/level/{level}', 'ResultsController@returnJobForLevel');
Route::get('results/client/{client}/job/site/{site}/level/{level}', 'ResultsController@returnJobForSiteAndLevel');

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

Route::get('results/siteaverage/level/{level}/question/{question}', 'ResultsController@returnAverageDataForSites');

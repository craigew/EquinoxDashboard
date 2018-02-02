<?php

namespace App\Http\Controllers;

use App\Results;
use DB;
use Illuminate\Http\Request;
use Log;

class ResultsController extends Controller
{
    public function index()
    {
        return Results::all();
    }

    public function returnBySite($site)
    {
        return Results::where('Site', $site)
            ->get();
    }

    public function returnByLevel($level)
    {
        return Results::where('Level', $level)
            ->get();
    }

    public function returnBySiteAndLevel($site, $level)
    {
        return Results::where('Site', $site)
            ->where('Level', $level)
            ->get();
    }

    public function returnQuestion($client, $id)
    {
        if ($client == "sx2017" || $client == "sx2018" and $id == '11') {
            return DB::select("SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal
where Engagement='" . $client . "'
group by `11`
order by `11` desc");
        } else if ($client == "sx2017" || $client == "sx2018" and $id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal
where Engagement='" . $client . "'
group by `44`;");
        } else if ($client == "sheltam2017" and $id == '38') {
            return DB::select("select `38` description ,count(*) count
FROM Equinox.ResultsFinal
where Engagement='" . $client . "'
group by `38`;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
where Engagement='" . $client . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }
    }

    public function returnQuestionForLevel($client, $id, $level)
    {
        if ($client == "sx2017" || $client == "sx2018" and $id == '11') {
            return DB::select("SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal
where Level='" . $level . "'
and Engagement='" . $client . "'
group by `11`
order by `11` desc");
        } else if ($client == "sx2017" || $client == "sx2018" and $id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal
where Level='" . $level . "'
and Engagement='" . $client . "'
group by `44`;");
        } else if ($client == "sheltam2017" and $id == '38') {
            return DB::select("select `38` description ,count(*) count
FROM Equinox.ResultsFinal
where Level='" . $level . "'
and Engagement='" . $client . "'
group by `38`;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
where Level='" . $level . "'
and Engagement='" . $client . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }

    }

    public function returnQuestionForSite($client, $id, $site)
    {
        if ($client == "sx2017" || $client == "sx2018" and $id == '11') {
            return DB::select("SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Engagement='" . $client . "'
group by `11`
order by `11` desc");
        } else if ($client == "sx2017" || $client == "sx2018" and $id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Engagement='" . $client . "'
group by `44`;");
        } else if ($client == "sheltam2017" and $id == '38') {
            return DB::select("select `38` description ,count(*) count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Engagement='" . $client . "'
group by `38`;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
where Site='" . $site . "'
and Engagement='" . $client . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }

    }

    public function returnQuestionForSiteAndLevel($client, $id, $site, $level)
    {
        if ($client == "sx2017" || $client == "sx2018" and $id == '11') {
            return DB::select("SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Level='" . $level . "'
and Engagement='" . $client . "'
group by `11`
order by `11` desc");
        } else if ($client == "sx2017" || $client == "sx2018" and $id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Level='" . $level . "'
and Engagement='" . $client . "'
group by `44`;");
        } else if ($client == "sheltam2017" and $id == '38') {
            return DB::select("select `38` description ,count(*) count
FROM Equinox.ResultsFinal
where Site='" . $site . "'
and Level='" . $level . "'
and Engagement='" . $client . "'
group by `38`;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
where Site='" . $site . "'
and Level='" . $level . "'
and Engagement='" . $client . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }
    }

    public
    function returnEngagement($client)
    {
        return $this->engagementSelect($client, '', '');
    }

    public
    function returnEngagementForSite($client, $site)
    {
        return $this->engagementSelect($client, $site, '');
    }

    public
    function returnEngagementForLevel($client, $level)
    {
        return $this->engagementSelect($client, '', $level);
    }

    public
    function returnEngagementForSiteAndLevel($client, $site, $level)
    {
        return $this->engagementSelect($client, $site, $level);
    }

    function engagementSelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`1`+`2`+`3`+`4`+`5`+`6`+`7`+`8`+`9`+`10`)/10) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='" . $client . "') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnTeamwork($client)
    {
        return $this->teamworkSelect($client, '', '');
    }

    public
    function returnTeamworkForSite($client, $site)
    {
        return $this->teamworkSelect($client, $site, '');
    }

    public
    function returnTeamworkForLevel($client, $level)
    {
        return $this->teamworkSelect($client, '', $level);
    }

    public
    function returnTeamworkForSiteAndLevel($client, $site, $level)
    {
        return $this->teamworkSelect($client, $site, $level);
    }

    function teamworkSelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`12`+`13`+`14`+`15`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='" . $client . "') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnStrategy($client)
    {
        return $this->strategySelect($client, '', '');
    }

    public
    function returnStrategyForSite($client, $site)
    {
        return $this->strategySelect($client, $site, '');
    }

    public
    function returnStrategyForLevel($client, $level)
    {
        return $this->strategySelect($client, '', $level);
    }

    public
    function returnStrategyForSiteAndLevel($client, $site, $level)
    {
        return $this->strategySelect($client, $site, $level);
    }

    function strategySelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`16`+`17`+`18`+`19`+`20`+`21`)/6) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='" . $client . "') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnMeaning()
    {
        return $this->meaningSelect('', '', '');
    }

    public
    function returnMeaningForSite($client, $site)
    {
        return $this->meaningSelect('',$site, '');
    }

    public
    function returnMeaningForLevel($client,$level)
    {
        return $this->meaningSelect('', '', $level);
    }

    public
    function returnMeaningForSiteAndLevel($client,$site, $level)
    {
        return $this->meaningSelect('',$site, $level);
    }

    function meaningSelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`16`+`17`+`18`+`19`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnRecognition()
    {
        return $this->recognitionSelect('', '', '');
    }

    public
    function returnRecognitionForSite($client, $site)
    {
        return $this->recognitionSelect('',$site, '');
    }

    public
    function returnRecognitionForLevel($client, $level)
    {
        return $this->recognitionSelect('','', $level);
    }

    public
    function returnRecognitionForSiteAndLevel($client, $site, $level)
    {
        return $this->recognitionSelect('',$site, $level);
    }

    function recognitionSelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`20`+`21`+`22`+`23`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnLeadership($client)
    {
        return $this->leadershipSelect($client, '', '');
    }

    public
    function returnLeadershipForSite($client, $site)
    {
        return $this->leadershipSelect($client, $site, '');
    }

    public
    function returnLeadershipForLevel($client, $level)
    {
        return $this->leadershipSelect($client, '', $level);
    }

    public
    function returnLeadershipForSiteAndLevel($client, $site, $level)
    {
        return $this->leadershipSelect($client, $site, $level);
    }

    function leadershipSelect($client, $site, $level)
    {
        if ($client == "sheltam2017") {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`22`+`23`+`24`+`25`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`24`+`25`+`26`+`27`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        }
    }

    public
    function returnSuperior($client)
    {
        return $this->superiorSelect($client, '', '');
    }

    public
    function returnSuperiorForSite($client, $site)
    {
        return $this->superiorSelect($client, $site, '');
    }

    public
    function returnSuperiorForLevel($client, $level)
    {
        return $this->superiorSelect($client, '', $level);
    }

    public
    function returnSuperiorForSiteAndLevel($client, $site, $level)
    {
        return $this->superiorSelect($client, $site, $level);
    }

    function superiorSelect($client, $site, $level)
    {
        if ($client == "sheltam2017") {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`26`+`27`+`28`+`29`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`28`+`29`+`30`+`31`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        }
    }

    public
    function returnCommunication($client)
    {
        return $this->communicationSelect($client, '', '');
    }

    public
    function returnCommunicationForSite($client, $site)
    {
        return $this->communicationSelect($client, $site, '');
    }

    public
    function returnCommunicationForLevel($client, $level)
    {
        return $this->communicationSelect($client, '', $level);
    }

    public
    function returnCommunicationForSiteAndLevel($client, $site, $level)
    {
        return $this->communicationSelect($client, $site, $level);
    }

    function communicationSelect($client, $site, $level)
    {
        if ($client == "sheltam2017") {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`30`+`31`+`32`+`33`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`32`+`33`+`34`+`35`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        }
    }

    public
    function returnLearning($client)
    {
        return $this->learningSelect($client, '', '');
    }

    public
    function returnLearningForSite($client, $site)
    {
        return $this->learningSelect($client, $site, '');
    }

    public
    function returnLearningForLevel($client, $level)
    {
        return $this->learningSelect($client, '', $level);
    }

    public
    function returnLearningForSiteAndLevel($client, $site, $level)
    {
        return $this->learningSelect($client, $site, $level);
    }

    function learningSelect($client, $site, $level)
    {
        if ($client == "sheltam2017") {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`34`+`35`+`36`+`37`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        } else {
            return DB::select("SELECT description,count(*) as count
FROM (select round((`36`+`37`+`38`+`39`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
        }
    }

    public
    function returnJob()
    {
        return $this->jobSelect('','', '');
    }

    public
    function returnJobForSite($client, $site)
    {
        return $this->jobSelect('',$site, '');
    }

    public
    function returnJobForLevel($client, $level)
    {
        return $this->jobSelect('','', $level);
    }

    public
    function returnJobForSiteAndLevel($client, $site, $level)
    {
        return $this->jobSelect('',$site, $level);
    }

    function jobSelect($client, $site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`40`+`41`+`42`+`43`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    function agreeStronglyAgreeAverageSelect($question, $site)
    {
        return DB::select("SELECT Round((count(`" . $question . "`)/(select count(*) from Equinox.ResultsFinal where (site='" . $site . "' or ''='" . $site . "')))*100) as PercPosResp
FROM Equinox.ResultsFinal
where `" . $question . "` in (3,4)
and (site='" . $site . "' or ''='" . $site . "');");
    }

    function resultComparisonQuestion($id)
    {
        return DB::select("select SX2017.description,SX2017Count,SX2018Count from
(SELECT description, count(*) as SX2017Count, Engagement
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "` =id
        where Engagement='SX2017'
        group by `" . $id . "`,description, Engagement
        order by `" . $id . "` desc) as SX2017 inner
 join (SELECT description, count(*) as SX2018Count, Engagement
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "` =id
        where Engagement='SX2018'
        group by `" . $id . "`,description, Engagement
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description;");
    }

    public function returnAverageDataForEngagement($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '10'),
            $this->createAverageDataForEngagementNode($site, '9'),
            $this->createAverageDataForEngagementNode($site, '8'),
            $this->createAverageDataForEngagementNode($site, '7'),
            $this->createAverageDataForEngagementNode($site, '6'),
            $this->createAverageDataForEngagementNode($site, '5'),
            $this->createAverageDataForEngagementNode($site, '4'),
            $this->createAverageDataForEngagementNode($site, '3'),
            $this->createAverageDataForEngagementNode($site, '2'),
            $this->createAverageDataForEngagementNode($site, '1'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForTeamwork($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '15'),
            $this->createAverageDataForEngagementNode($site, '14'),
            $this->createAverageDataForEngagementNode($site, '13'),
            $this->createAverageDataForEngagementNode($site, '12'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForMeaning($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '19'),
            $this->createAverageDataForEngagementNode($site, '18'),
            $this->createAverageDataForEngagementNode($site, '17'),
            $this->createAverageDataForEngagementNode($site, '16'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForRecognition($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '23'),
            $this->createAverageDataForEngagementNode($site, '22'),
            $this->createAverageDataForEngagementNode($site, '21'),
            $this->createAverageDataForEngagementNode($site, '20'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForLeadership($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '27'),
            $this->createAverageDataForEngagementNode($site, '26'),
            $this->createAverageDataForEngagementNode($site, '25'),
            $this->createAverageDataForEngagementNode($site, '24'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForSuperior($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '31'),
            $this->createAverageDataForEngagementNode($site, '30'),
            $this->createAverageDataForEngagementNode($site, '29'),
            $this->createAverageDataForEngagementNode($site, '28'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForCommunication($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '35'),
            $this->createAverageDataForEngagementNode($site, '34'),
            $this->createAverageDataForEngagementNode($site, '33'),
            $this->createAverageDataForEngagementNode($site, '32'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForLearning($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '39'),
            $this->createAverageDataForEngagementNode($site, '38'),
            $this->createAverageDataForEngagementNode($site, '37'),
            $this->createAverageDataForEngagementNode($site, '36'),
        );

        return json_encode($data);

    }

    public function returnAverageDataForJob($site)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '43'),
            $this->createAverageDataForEngagementNode($site, '42'),
            $this->createAverageDataForEngagementNode($site, '41'),
            $this->createAverageDataForEngagementNode($site, '40'),
        );

        return json_encode($data);

    }

    function createAverageDataForEngagementNode($site, $question)
    {
        $siteData = $this->agreeStronglyAgreeAverageSelect($question, $site);
        $sx = $this->agreeStronglyAgreeAverageSelect($question, '');

        return array("Name" => $question,
            $site => $siteData[0]->PercPosResp,
            "Shatterpruffe" => $sx[0]->PercPosResp);
    }

    function averageResultComparison($question)
    {
        $siteData = $this->resultComparisonQuestion($question);

        $results = array();
        for ($i = 0; $i <= 3; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2017" => $siteData[$i]->SX2017Count,
                "SX2018" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    public function returnAverageDataForLevels($site, $question)
    {
//        return DB::select("Select posCount.Level,Round((TotPosCountForLevel/TotCountForLevel)*100) as PerPosResp
//from (select count(*) as TotPosCountForLevel,Level
//from Equinox.ResultsFinal a
//where `" . $question . "` in (3,4)
//and site='" . $site . "' or ''='" . $site . "'
//group by Level) posCount,
//(select count(*) as TotCountForLevel,Level
//from Equinox.ResultsFinal a
//where site='" . $site . "' or ''='" . $site . "'
//group by Level) totCount
//where posCount.Level=totCount.Level
//union
//select \"Site Positive results\" as Level,Round((count(*)/(select count(*) from Equinox.ResultsFinal where site='" . $site . "' or ''='" . $site . "'))*100) sitePerc
//from Equinox.ResultsFinal a
//where `" . $question . "` in (3,4)
//and site='" . $site . "' or ''='" . $site . "'");

        return DB::select("select *
from
(
Select posCount.Level,Round((TotPosCountForLevel/TotCountForLevel)*100) as PerPosResp
from (select count(*) as TotPosCountForLevel,Level
from Equinox.ResultsFinal a
where `" . $question . "` in (3,4)
and site='" . $site . "' or ''='" . $site . "'
group by Level) posCount,
(select count(*) as TotCountForLevel,Level
from Equinox.ResultsFinal a
where site='" . $site . "' or ''='" . $site . "'
group by Level) totCount
where posCount.Level=totCount.Level
union
select \"Site Positive results\" as Level,Round((count(*)/(select count(*) from Equinox.ResultsFinal where site='" . $site . "' or ''='" . $site . "'))*100) sitePerc
from Equinox.ResultsFinal a
where `" . $question . "` in (3,4)
and site='" . $site . "' or ''='" . $site . "') a
order by
CASE
WHEN Level='Shopfloor' THEN 1
 WHEN Level='General_Staff' THEN 2
  WHEN Level = 'Senior_Staff' THEN 3
 WHEN Level = 'Junior_Management' THEN 4
 WHEN Level = 'Middle_Management' THEN 5
WHEN Level='Senior_Management' THEN 6
WHEN Level='Site Positive results' THEN 7
END");

    }

    public function returnAverageDataForSites($level, $question)
    {
//        return DB::select("SELECT Site,round(avg(`1`),2) as average
//FROM Equinox.ResultsFinal
//where `1` in (3,4)
//and Level='" . $level . "' or ''='" . $level . "'
//group by Site
//union
//select 'All Site Average' as Site,round(avg(`1`),2) as average
//FROM Equinox.ResultsFinal
//where `1` in (3,4)
//and Level='" . $level . "' or ''='" . $level . "'");

        return DB::select("Select posCount.Site,Round((TotPosCountForLevel/TotCountForLevel)*100) as PerPosResp
from (select count(*) as TotPosCountForLevel,Site
from Equinox.ResultsFinal a
where `" . $question . "` in (3,4)
and Level='" . $level . "' or ''='" . $level . "'
group by Site) posCount,
(select count(*) as TotCountForLevel,Site
from Equinox.ResultsFinal a
where Level='" . $level . "' or ''='" . $level . "'
group by Site) totCount
where posCount.Site=totCount.Site
union
select \"Level Positive results\" as Site,Round((count(*)/(select count(*) from Equinox.ResultsFinal where Level='" . $level . "' or ''='" . $level . "'))*100) sitePerc
from Equinox.ResultsFinal a
where `" . $question . "` in (3,4)
and Level='" . $level . "' or ''='" . $level . "'");
    }


}

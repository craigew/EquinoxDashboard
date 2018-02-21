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
        return $this->meaningSelect('', $site, '');
    }

    public
    function returnMeaningForLevel($client, $level)
    {
        return $this->meaningSelect('', '', $level);
    }

    public
    function returnMeaningForSiteAndLevel($client, $site, $level)
    {
        return $this->meaningSelect('', $site, $level);
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
        return $this->recognitionSelect('', $site, '');
    }

    public
    function returnRecognitionForLevel($client, $level)
    {
        return $this->recognitionSelect('', '', $level);
    }

    public
    function returnRecognitionForSiteAndLevel($client, $site, $level)
    {
        return $this->recognitionSelect('', $site, $level);
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
        return $this->jobSelect('', '', '');
    }

    public
    function returnJobForSite($client, $site)
    {
        return $this->jobSelect('', $site, '');
    }

    public
    function returnJobForLevel($client, $level)
    {
        return $this->jobSelect('', '', $level);
    }

    public
    function returnJobForSiteAndLevel($client, $site, $level)
    {
        return $this->jobSelect('', $site, $level);
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

    function agreeStronglyAgreeAverageSelect($question, $site, $year)
    {
        return DB::select("SELECT Round((count(`" . $question . "`)/(select count(*) from Equinox.ResultsFinal where (site='" . $site . "' or ''='" . $site . "')))*100) as PercPosResp
FROM Equinox.ResultsFinal
where `" . $question . "` in (3,4)
and Engagement = '" . $year . "'
and (site='" . $site . "' or ''='" . $site . "');");
    }

    public function returnAverageDataForEngagement($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '10', $year),
            $this->createAverageDataForEngagementNode($site, '9', $year),
            $this->createAverageDataForEngagementNode($site, '8', $year),
            $this->createAverageDataForEngagementNode($site, '7', $year),
            $this->createAverageDataForEngagementNode($site, '6', $year),
            $this->createAverageDataForEngagementNode($site, '5', $year),
            $this->createAverageDataForEngagementNode($site, '4', $year),
            $this->createAverageDataForEngagementNode($site, '3', $year),
            $this->createAverageDataForEngagementNode($site, '2', $year),
            $this->createAverageDataForEngagementNode($site, '1', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForTeamwork($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '15', $year),
            $this->createAverageDataForEngagementNode($site, '14', $year),
            $this->createAverageDataForEngagementNode($site, '13', $year),
            $this->createAverageDataForEngagementNode($site, '12', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForMeaning($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '19', $year),
            $this->createAverageDataForEngagementNode($site, '18', $year),
            $this->createAverageDataForEngagementNode($site, '17', $year),
            $this->createAverageDataForEngagementNode($site, '16', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForRecognition($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '23', $year),
            $this->createAverageDataForEngagementNode($site, '22', $year),
            $this->createAverageDataForEngagementNode($site, '21', $year),
            $this->createAverageDataForEngagementNode($site, '20', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForLeadership($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '27', $year),
            $this->createAverageDataForEngagementNode($site, '26', $year),
            $this->createAverageDataForEngagementNode($site, '25', $year),
            $this->createAverageDataForEngagementNode($site, '24', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForSuperior($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '31', $year),
            $this->createAverageDataForEngagementNode($site, '30', $year),
            $this->createAverageDataForEngagementNode($site, '29', $year),
            $this->createAverageDataForEngagementNode($site, '28', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForCommunication($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '35', $year),
            $this->createAverageDataForEngagementNode($site, '34', $year),
            $this->createAverageDataForEngagementNode($site, '33', $year),
            $this->createAverageDataForEngagementNode($site, '32', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForLearning($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '39', $year),
            $this->createAverageDataForEngagementNode($site, '38', $year),
            $this->createAverageDataForEngagementNode($site, '37', $year),
            $this->createAverageDataForEngagementNode($site, '36', $year),
        );

        return json_encode($data);

    }

    public function returnAverageDataForJob($site, $year)
    {
        $data = array(
            $this->createAverageDataForEngagementNode($site, '43', $year),
            $this->createAverageDataForEngagementNode($site, '42', $year),
            $this->createAverageDataForEngagementNode($site, '41', $year),
            $this->createAverageDataForEngagementNode($site, '40', $year),
        );

        return json_encode($data);

    }

    function createAverageDataForEngagementNode($site, $question, $year)
    {
        $siteData = $this->agreeStronglyAgreeAverageSelect($question, $site, $year);
        $sx = $this->agreeStronglyAgreeAverageSelect($question, '', $year);

        return array("Name" => $question,
            $site => $siteData[0]->PercPosResp,
            "Shatterpruffe" => $sx[0]->PercPosResp);
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

    /* Result Comparison Functions */
    function resultComparisonQuestion($id)
    {
        if ($id == '11') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        group by `11`,description
        order by `11` desc) as SX2017 left outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        group by `11`,description
        order by `11` desc) as SX2017 right outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        } elseif ($id == '44') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        group by `44`,description) as SX2017 left outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        group by `44`,description) as SX2017 right outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description;");
        } else {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 left outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 right outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        }
    }

    function resultComparisonSite($id, $site)
    {
        if ($id == '11') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2017 left outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2017 right outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        } elseif ($id == '44') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `44`,description) as SX2017 left outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `44`,description) as SX2017 right outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description;");
        } else {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 left outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 right outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        }
    }

    function resultComparisonLevel($id, $level)
    {
        if ($id == '11') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        group by `11`,description
        order by `11` desc) as SX2017 left outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        group by `11`,description
        order by `11` desc) as SX2017 right outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        } elseif ($id == '44') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        and Level ='" . $level . "'
        group by `44`,description) as SX2017 left outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
       and Level ='" . $level . "'
        group by `44`,description) as SX2017 right outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description;");
        } else {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 left outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
       and Level ='" . $level . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 right outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Level ='" . $level . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        }
    }

    function resultComparisonSiteAndLevel($id, $site, $level)
    {
        if ($id == '11') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2017 left outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2017 right outer
 join (SELECT case `11`
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description',count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `11` =id
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `11`,description
        order by `11` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        } elseif ($id == '44') {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
        and Level ='" . $level . "'
        and Site ='" . $site . "'
        group by `44`,description) as SX2017 left outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(select `44` description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal
        where Engagement='SX2017'
       and Level ='" . $level . "'
       and Site ='" . $site . "'
        group by `44`,description) as SX2017 right outer
 join (select `44` description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `44`,description) as SX2018
        ON SX2017.description=SX2018.description;");
        } else {
            return DB::select("select SX2017.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
        and Level ='" . $level . "'
        and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 left outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description
union
select SX2018.description,coalesce(SX2017Count,0) as SX2017Count,coalesce(SX2018Count,0) as SX2018Count from
(SELECT description,count(*) as SX2017Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
        where Engagement='SX2017'
       and Level ='" . $level . "'
       and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2017 right outer
 join (SELECT description,count(*) as SX2018Count
        FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id
		where Engagement='SX2018'
		and Level ='" . $level . "'
		and Site ='" . $site . "'
        group by `" . $id . "`,description
        order by `" . $id . "` desc) as SX2018
        ON SX2017.description=SX2018.description;");
        }
    }

    /* Question - Engagement */
    function resultComparisonEngagement($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`1`+`2`+`3`+`4`+`5`+`6`+`7`+`8`+`9`+`10`)/10) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`1`+`2`+`3`+`4`+`5`+`6`+`7`+`8`+`9`+`10`)/10) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description");
    }

    /* Question - Teamwork */
    function resultComparisonTeamwork($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`12`+`13`+`14`+`15`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`12`+`13`+`14`+`15`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Meaning */
    function resultComparisonMeaning($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`16`+`17`+`18`+`19`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`16`+`17`+`18`+`19`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Recognition */
    function resultComparisonRecognition($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`20`+`21`+`22`+`23`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`20`+`21`+`22`+`23`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Leadership */
    function resultComparisonLeadership($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`24`+`25`+`26`+`27`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`24`+`25`+`26`+`27`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Superior */
    function resultComparisonSuperior($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`28`+`29`+`30`+`31`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`28`+`29`+`30`+`31`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Communication */
    function resultComparisonCommunication($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`32`+`33`+`34`+`35`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`32`+`33`+`34`+`35`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Leaning */
    function resultComparisonLeaning($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`36`+`37`+`38`+`39`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`36`+`37`+`38`+`39`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }

    /* Question - Job */
    function resultComparisonJob($site, $level)
    {
        return DB::select("select SX2018.description, coalesce(SX2017Count,0) as SX2017Count, coalesce(SX2018Count,0) as SX2018Count from (
SELECT description,count(*) as SX2017Count
FROM (select round((`40`+`41`+`42`+`43`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2017') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2017 right outer
join (SELECT description,count(*) as SX2018Count
FROM (select round((`40`+`41`+`42`+`43`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')
and Engagement='SX2018') a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc) as SX2018
ON SX2017.description=SX2018.description;");
    }


    /* Result Comparison Results Returned */
    function averageComparisonQuestion($question)
    {
        $siteData = $this->resultComparisonQuestion($question);
        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }


        return $results;
    }

    function averageComparisonLevel($question, $level)
    {
        $siteData = $this->resultComparisonLevel($question, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonSite($question, $site)
    {
        $siteData = $this->resultComparisonSite($question, $site);
        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonSiteAndLevel($question, $site, $level)
    {
        $siteData = $this->resultComparisonSiteAndLevel($question, $site, $level);
        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Engagement */
    function averageComparisonEngagement()
    {
        $siteData = $this->resultComparisonEngagement('', '');
        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonEngagementSite($site)
    {
        $siteData = $this->resultComparisonEngagement($site, '');
        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonEngagementLevel($level)
    {
        $siteData = $this->resultComparisonEngagement('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonEngagementSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonEngagement($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Teamwork */
    function averageComparisonTeamwork()
    {
        $siteData = $this->resultComparisonTeamwork('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonTeamworkSite($site)
    {
        $siteData = $this->resultComparisonTeamwork($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonTeamworkLevel($level)
    {
        $siteData = $this->resultComparisonTeamwork('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonTeamworkSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonTeamwork($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Meaning */
    function averageComparisonMeaning()
    {
        $siteData = $this->resultComparisonMeaning('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonMeaningSite($site)
    {
        $siteData = $this->resultComparisonMeaning($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonMeaningLevel($level)
    {
        $siteData = $this->resultComparisonMeaning('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonMeaningSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonMeaning($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Recognition */
    function averageComparisonRecognition()
    {
        $siteData = $this->resultComparisonRecognition('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonRecognitionSite($site)
    {
        $siteData = $this->resultComparisonRecognition($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonRecognitionLevel($level)
    {
        $siteData = $this->resultComparisonRecognition('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonRecognitionSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonRecognition($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Leadership */
    function averageComparisonLeadership()
    {
        $siteData = $this->resultComparisonLeadership('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeadershipSite($site)
    {
        $siteData = $this->resultComparisonLeadership($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeadershipLevel($level)
    {
        $siteData = $this->resultComparisonLeadership('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeadershipSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonLeadership($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Superior */
    function averageComparisonSuperior()
    {
        $siteData = $this->resultComparisonSuperior('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonSuperiorSite($site)
    {
        $siteData = $this->resultComparisonSuperior($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonSuperiorLevel($level)
    {
        $siteData = $this->resultComparisonSuperior('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonSuperiorSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonSuperior($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Communication */
    function averageComparisonCommunication()
    {
        $siteData = $this->resultComparisonCommunication('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonCommunicationSite($site)
    {
        $siteData = $this->resultComparisonCommunication($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonCommunicationLevel($level)
    {
        $siteData = $this->resultComparisonCommunication('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonCommunicationSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonCommunication($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Leaning */
    function averageComparisonLeaning()
    {
        $siteData = $this->resultComparisonLeaning('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeaningSite($site)
    {
        $siteData = $this->resultComparisonLeaning($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeaningLevel($level)
    {
        $siteData = $this->resultComparisonLeaning('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonLeaningSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonLeaning($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    /* Job */
    function averageComparisonJob()
    {
        $siteData = $this->resultComparisonJob('', '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonJobSite($site)
    {
        $siteData = $this->resultComparisonJob($site, '');

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonJobLevel($level)
    {
        $siteData = $this->resultComparisonJob('', $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }

    function averageComparisonJobSiteAndLevel($site, $level)
    {
        $siteData = $this->resultComparisonJob($site, $level);

        $arr_length = count($siteData);

        $results = array();
        for ($i = 0; $i <= $arr_length - 1; $i++) {
            array_push($results, [
                "Name" => $siteData[$i]->description,
                "SX2016" => $siteData[$i]->SX2017Count,
                "SX2017" => $siteData[$i]->SX2018Count
            ]);
        }

        return $results;
    }


}

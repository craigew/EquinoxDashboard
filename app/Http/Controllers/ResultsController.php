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

    public function returnQuestion($id)
    {
        if ($id == '11') {
            return DB::select("SELECT case `11` 
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal 
group by `11`
order by `11` desc");
        } else if ($id == '44') {
            return DB::select('select `44` description ,count(*) count
FROM Equinox.ResultsFinal 
group by `44`;');
        } else {
            return DB::select('SELECT description,count(*) as count 
FROM Equinox.ResultsFinal inner join Equinox.labels on `' . $id . '`=id 
group by `' . $id . '`,description 
order by `' . $id . '` desc;');
        }
    }

    public function returnQuestionForLevel($id, $level)
    {
        if ($id == '11') {
            return DB::select("SELECT case `11` 
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal 
where Level='" . $level . "'
group by `11`
order by `11` desc");
        } else if ($id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal 
where Level='" . $level . "'
group by `44`;");
        } else {
            return DB::select("SELECT description,count(*) as count 
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id 
where Level='" . $level . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }
    }

    public function returnQuestionForSite($id, $site)
    {
        if ($id == '11') {
            return DB::select("SELECT case `11` 
when '1' then 'Extremely Disatisfied'
when '2' then 'Disatisfied'
when '3' then 'Satisfied'
when '4' then 'Extremely Satisfied'
else 'No'
end as 'description' ,count(*) as count
FROM Equinox.ResultsFinal 
where Site='" . $site . "'
group by `11`
order by `11` desc");
        } else if ($id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal 
where Site='" . $site . "'
group by `44`;");
        } else {
            return DB::select("SELECT description,count(*) as count 
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id 
where Site='" . $site . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }

    }

    public function returnQuestionForSiteAndLevel($id, $site, $level)
    {
        if ($id == '11') {
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
group by `11`
order by `11` desc");
        } else if ($id == '44') {
            return DB::select("select `44` description ,count(*) count
FROM Equinox.ResultsFinal 
where Site='" . $site . "'
and Level='" . $level . "'
group by `44`;");
        } else {
            return DB::select("SELECT description,count(*) as count 
FROM Equinox.ResultsFinal inner join Equinox.labels on `" . $id . "`=id 
where Site='" . $site . "'
and Level='" . $level . "'
group by `" . $id . "`,description
order by `" . $id . "` desc;");
        }
    }

    public
    function returnEngagement()
    {
        return $this->engagementSelect('', '');
    }

    public
    function returnEngagementForSite($site)
    {
        return $this->engagementSelect($site, '');
    }

    public
    function returnEngagementForLevel($level)
    {
        return $this->engagementSelect('', $level);
    }

    public
    function returnEngagementForSiteAndLevel($site, $level)
    {
        return $this->engagementSelect($site, $level);
    }

    function engagementSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`1`+`2`+`3`+`4`+`5`+`6`+`7`+`8`+`9`+`10`)/10) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnTeamwork()
    {
        return $this->teamworkSelect('', '');
    }

    public
    function returnTeamworkForSite($site)
    {
        return $this->teamworkSelect($site, '');
    }

    public
    function returnTeamworkForLevel($level)
    {
        return $this->teamworkSelect('', $level);
    }

    public
    function returnTeamworkForSiteAndLevel($site, $level)
    {
        return $this->teamworkSelect($site, $level);
    }

    function teamworkSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`12`+`13`+`14`+`15`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnMeaning()
    {
        return $this->meaningSelect('', '');
    }

    public
    function returnMeaningForSite($site)
    {
        return $this->meaningSelect($site, '');
    }

    public
    function returnMeaningForLevel($level)
    {
        return $this->meaningSelect('', $level);
    }

    public
    function returnMeaningForSiteAndLevel($site, $level)
    {
        return $this->meaningSelect($site, $level);
    }

    function meaningSelect($site, $level)
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
        return $this->recognitionSelect('', '');
    }

    public
    function returnRecognitionForSite($site)
    {
        return $this->recognitionSelect($site, '');
    }

    public
    function returnRecognitionForLevel($level)
    {
        return $this->recognitionSelect('', $level);
    }

    public
    function returnRecognitionForSiteAndLevel($site, $level)
    {
        return $this->recognitionSelect($site, $level);
    }

    function recognitionSelect($site, $level)
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
    function returnLeadership()
    {
        return $this->leadershipSelect('', '');
    }

    public
    function returnLeadershipForSite($site)
    {
        return $this->leadershipSelect($site, '');
    }

    public
    function returnLeadershipForLevel($level)
    {
        return $this->leadershipSelect('', $level);
    }

    public
    function returnLeadershipForSiteAndLevel($site, $level)
    {
        return $this->leadershipSelect($site, $level);
    }

    function leadershipSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`24`+`25`+`26`+`27`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnSuperior()
    {
        return $this->superiorSelect('', '');
    }

    public
    function returnSuperiorForSite($site)
    {
        return $this->superiorSelect($site, '');
    }

    public
    function returnSuperiorForLevel($level)
    {
        return $this->superiorSelect('', $level);
    }

    public
    function returnSuperiorForSiteAndLevel($site, $level)
    {
        return $this->superiorSelect($site, $level);
    }

    function superiorSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`28`+`29`+`30`+`31`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnCommunication()
    {
        return $this->communicationSelect('', '');
    }

    public
    function returnCommunicationForSite($site)
    {
        return $this->communicationSelect($site, '');
    }

    public
    function returnCommunicationForLevel($level)
    {
        return $this->communicationSelect('', $level);
    }

    public
    function returnCommunicationForSiteAndLevel($site, $level)
    {
        return $this->communicationSelect($site, $level);
    }

    function communicationSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`32`+`33`+`34`+`35`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnLearning()
    {
        return $this->learningSelect('', '');
    }

    public
    function returnLearningForSite($site)
    {
        return $this->learningSelect($site, '');
    }

    public
    function returnLearningForLevel($level)
    {
        return $this->learningSelect('', $level);
    }

    public
    function returnLearningForSiteAndLevel($site, $level)
    {
        return $this->learningSelect($site, $level);
    }

    function learningSelect($site, $level)
    {
        return DB::select("SELECT description,count(*) as count
FROM (select round((`36`+`37`+`38`+`39`)/4) as Engagement_Avg
from Equinox.ResultsFinal
where (Site='" . $site . "' or ''='" . $site . "')
and (Level='" . $level . "' or ''='" . $level . "')) a inner join Equinox.labels on a.Engagement_Avg=id
group by Engagement_Avg,description
order by Engagement_Avg desc;");
    }

    public
    function returnJob()
    {
        return $this->jobSelect('', '');
    }

    public
    function returnJobForSite($site)
    {
        return $this->jobSelect($site, '');
    }

    public
    function returnJobForLevel($level)
    {
        return $this->jobSelect('', $level);
    }

    public
    function returnJobForSiteAndLevel($site, $level)
    {
        return $this->jobSelect($site, $level);
    }

    function jobSelect($site, $level)
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

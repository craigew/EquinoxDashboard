@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ app('request')->input('site') }}
@endsection

@section('contentheader_title')
{{ app('request')->input('site') }}
@stop

@section('main-content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-6">
            <div id="question1"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question3"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question4"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question6"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question7"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question8"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question9"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question10"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question11"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question12"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question13"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question14"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question15"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question16"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div id="question17"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question18"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question19"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question21"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question22"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question23"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question24"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question25"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question26"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question27"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question28"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question29"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question30"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question31"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question32"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question33"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question34"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question35"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question36"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question37"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question38"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question39"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question40"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question41"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question42"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="question43"></div>
        </div>
    </div>

    <script>
        function verticalWrap(text, width) {
            text.each(function () {
                var text = d3.select(this),
                    words = text.text().split(/\s+/).reverse(),
                    word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.1, // ems
                    y = text.attr("y"),
                    x = text.attr("x"),
                    dy = parseFloat(text.attr("dy")),
                    tspan = text.text(null).append("tspan").attr("x", x).attr("y", y).attr("dy", dy + "em");
                while (word = words.pop()) {
                    line.push(word);
                    tspan.text(line.join(" "));
                    if (tspan.node().getComputedTextLength() > width) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text.append("tspan").attr("x", x).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
                    }
                }
            });
        }

        var questions = ["When at work I am completely focused on my job.",
            "I am constantly thinking of new and better ways of doing things to help Shatterprufe succeed.",
            "I am proud to work for Shatterprufe.",
            "I care about the future of Shatterprufe.",
            "I am passionate and enthusiastic about the work I do.",
            "This organisation inspires me to do my best work every day.",
            "I am willing to go beyond what is normally expected to help Shatterprufe succeed.",
            "I hardly ever think about leaving Shatterprufe to work somewhere else.",
            "I would recommend Shatterprufe as a great place to work.",
            "Given the opportunity, I tell others great things about working here.",
            "On a scale of 1 – 4 where “4” is extremely satisfied and “1” is extremely dissatisfied, how satisfied are you with Shatterprufe as a place to work?",
            "I can trust the people I work with.",
            "My team works well together.",
            "I have a friend at work.",
            "I feel like I belong here.",
            "My job gives me a sense of meaning and purpose.",
            "The work I do makes a positive difference in the world.",
            "I understand how the work I do helps Shatterprufe succeed.",
            "I feel that the work I do in my job is valuable.",
            "My manager praises good work.",
            "At Shatterprufe I am recognised for my efforts.",
            "I get regular feedback about how I am doing.",
            "In the last two weeks, someone has thanked me for my work.",
            "Senior leadership provides clear direction for this organisation.",
            "Senior leadership demonstrates honesty and integrity.",
            "Senior leadership has created a work environment that drives high performance.",
            "Senior leadership fills me with excitement for the future of this organisation.",
            "My immediate superior treats people fairly.",
            "My immediate superior cares about people.",
            "My immediate superior demonstrates honesty and integrity.",
            "My immediate superior helps find solutions to problems. ",
            "This company uses my feedback to make improvements.",
            "There is good communication between different departments at Shatterprufe.",
            "Communication at my organisation keeps me up to date with what I need to know.",
            "I feel I can trust what my organisation tells me. ",
            "There are learning and growth opportunities at Shatterprufe.",
            "My Manager encourages and supports my development.",
            "I have received enough training to do my job well.",
            "In the last 6 months, someone has talked to me about my development.",
            "We have the necessary people here to get the work done.",
            "I have the skills and abilities to do my job well.",
            "Our tools and technology allow me to do my job well.",
            "I am given enough authority to make decisions I need to make."];

        function buildGraph(err, data, question) {
            if (err) throw err;

            var color = d3.scaleOrdinal(["#1f77b4", "#2ca02c"]);

            var margin = {top: 40, right: 20, bottom: 30, left: 120},
                width = 850 - margin.left - margin.right,
                height = 300 - margin.top - margin.bottom;

            var x = d3.scaleLinear().range([0, width]);
            var y = d3.scaleBand().range([height, 0]);

            var svg = d3.select("#question" + question)
                .append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .style("background-color","white")
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


            var text = svg.append("text")
                .attr("class", "title")
                .attr("x", 15)
                .attr("y", -10)
                .style("font-size", "0.75em")
                .style("font-weight", "bold")
                .style("font-family", "sans-serif")
                .text(questions[question - 1]);


            x.domain([0, 4]);
            y.domain(data.map(function (d) {
                return d.Site;
            })).padding(0.1);

            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(d3.axisBottom(x).ticks(5).tickFormat(function (d) {
                    return parseInt(d);
                }).tickSizeInner([-height]));

            svg.append("g")
                .attr("class", "y axis")
                .call(d3.axisLeft(y));

            svg.selectAll(".bar")
                .data(data)
                .enter().append("rect")
                .attr("class", "bar")
                .attr("x", 0)
                .attr("height", y.bandwidth())
                .attr("y", function (d) {
                    return y(d.Site);
                })
                .attr("width", function (d) {
                    return x(d.average);
                })
                .attr("fill", function (d, i) {
                    if (d.Site == "All Site Average") {
                        return color(0)
                    } else {
                        return color(1)
                    }
                })
                .style("opacity", "0.7");

            svg.selectAll(".x path")
                .style("display", "none");

            svg.selectAll(".axis line")
                .style("fill", "none")
                .style("stroke", "#D4D8DA")
                .style("stroke-width", "1px")
                .style("shape-rendering", "crispEdges");

            svg.selectAll(".axis path")
                .style("fill", "none")
                .style("stroke", "#D4D8DA")
                .style("stroke-width", "1px")
                .style("shape-rendering", "crispEdges")
        }

        var domain = "http://dashboard.co.za";
        //var domain = "http://35.167.165.90"

        var question = 1;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 1);
        });

        question = 2;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 2);
        });

        question = 3;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 3);
        });

        question = 4;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 4);
        });

        question = 5;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 5);
        });

        question = 6;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 6);
        });

        question = 7;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 7);
        });

        question = 8;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 8);
        });

        question = 9;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 9);
        });

        question = 10;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 10);
        });

        question = 11;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 11);
        });

        question = 12;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 12);
        });
        question = 13;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 13);
        });
        question = 14;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 14);
        });
        question = 15;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 15);
        });
        question = 16;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 16);
        });
        question = 17;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 17);
        });
        question = 18;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 18);
        });
        question = 19;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 19);
        });
        question = 20;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 20);
        });

        question = 21;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 21);
        });
        question = 22;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 22);
        });
        question = 23;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 23);
        });
        question = 24;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 24);
        });
        question = 25;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 25);
        });
        question = 26;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 26);
        });
        question = 27;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 27);
        });
        question = 28;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 28);
        });
        question = 29;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 29);
        });
        question = 30;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 30);
        });

        question = 31;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 31);
        });
        question = 32;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 32);
        });
        question = 33;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 33);
        });
        question = 34;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 34);
        });
        question = 35;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 35);
        });
        question = 36;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 36);
        });
        question = 37;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 37);
        });
        question = 38;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 38);
        });
        question = 39;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 39);
        });
        question = 40;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 40);
        });

        question = 41;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 41);
        });
        question = 42;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 42);
        });
        question = 43;
        var url = domain + "/results/siteaverage/level/{{ app('request')->input('site') }}/question/" + question;
        d3.json(url, function (err, data) {
            buildGraph(err, data, 43);
        });


    </script>


</div>
</div>
</div>
@endsection

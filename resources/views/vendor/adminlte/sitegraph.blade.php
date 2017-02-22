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
            <div id="Engagement"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Teamwork"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Meaning"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Recognition"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Leadership"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Superior"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Communication"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="Learning"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div id="Job"></div>
        </div>

    </div>




                    <script>
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

                        $(document).ready(function () {
                            $("#btnQuery").click(function () {
                                populateGraphs($("#site option:selected").text());
                            });

                            populateGraphs();
                        });

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

                        var margin = {top: 50, right: 50, bottom: 80, left: 300},
                            width = 950 - margin.left - margin.right,
                            height = 500 - margin.top - margin.bottom;


                        var domain = "http://dashboard.co.za";
                        //var domain = "http://35.167.165.90"


                        function populateGraphs() {
                            var site='{{ app('request')->input('site') }}'
                            var url = domain + "/results/average/engagement/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Engagement");
                            });

                            var url = domain + "/results/average/teamwork/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Teamwork");
                            });

                            var url = domain + "/results/average/meaning/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Meaning");
                            });

                            var url = domain + "/results/average/recognition/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Recognition");
                            });

                            var url = domain + "/results/average/leadership/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Leadership");
                            });

                            var url = domain + "/results/average/superior/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Superior");
                            });

                            var url = domain + "/results/average/communication/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Communication");
                            });

                            var url = domain + "/results/average/learning/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Learning");
                            });

                            var url = domain + "/results/average/job/" + site;
                            d3.json(url, function (err, data) {
                                buildGraph(data, "Job");
                            });
                        }


                        function buildGraph(data, target) {
                            d3.select("#" + target).html("");

                            var y0 = d3.scaleBand()
                                .rangeRound([height, 0])
                                .paddingInner(0.1);

                            var y1 = d3.scaleBand()
                                .padding(0.1)

                            var x = d3.scaleLinear()
                                .range([0, width]);

                            var color = d3.scaleOrdinal(["#1f77b4", "#2ca02c", "#ff7f0e", "rgb(214, 39, 40)"]);

                            var xAxis = d3.axisBottom(x)
                                .ticks(5)
                                .tickSize(-height);

                            var yAxis = d3.axisLeft(y0);

                            var svg = d3.select("#" + target).append("svg")
                                .attr("width", width + margin.left + margin.right)
                                .attr("height", height + margin.top + margin.bottom)
                                .append("g")
                                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                            var text = svg.append("text")
                                .attr("class", "title")
                                .attr("x", ((width) / 2))
                                .attr("y", -10)
                                .attr("text-anchor", "middle")
                                .style("font-size", "0.75em")
                                .style("font-weight", "bold")
                                .style("font-family", "sans-serif")
                                .text(target + " Results");

                            var options = d3.keys(data[0]).filter(function (key) {
                                return key !== "Name";
                            });

                            data.forEach(function (d) {
                                d.valores = options.map(function (name) {
                                    return {name: name, value: +d[name]};
                                });
                            });

                            y0.domain(data.map(function (d) {
                                return questions[d.Name-1];
                            }));
                            y1.domain(options).rangeRound([0, y0.bandwidth()]);
                            x.domain([0, 4]);


                            svg.append("g")
                                .attr("class", "x axis")
                                .attr("transform", "translate(0," + height + ")")
                                .call(xAxis);

                            svg.append("g")
                                .attr("class", "y axis")
                                .call(yAxis);

                            svg.selectAll(".y.axis .tick text")
                                .attr("y", "0")
                                .call(verticalWrap, 250);;

                            svg.selectAll(".tick line")
                                .style("opacity", "0.2");

                            var bar = svg.selectAll(".bar")
                                .data(data)
                                .enter().append("g")
                                .attr("class", "rect")
                                .attr("transform", function (d) {
                                    return "translate( 0," + y0(questions[d.Name-1]) + ")";
                                });

                            var bar_enter = bar.selectAll("rect")
                                .data(function (d) {
                                    return d.valores;
                                })
                                .enter()


                            bar_enter.append("rect")
                                .attr("height", y1.bandwidth())
                                .attr("y", function (d) {
                                    return y1(d.name);
                                })
                                .attr("x", function (d) {
                                    return 0;
                                })
                                .attr("value", function (d) {
                                    return d.name;
                                })
                                .attr("width", function (d) {
                                    return x(d.value);
                                })
                                .style("fill", function (d) {
                                    return color(d.name);
                                })
                                .style("opacity", 0.7);

                            bar_enter.append("text")
                                .attr("x", function (d) {
                                    return x(d.value) + 10;
                                })
                                .attr("y", function (d) {
                                    return y1(d.name) + (y1.bandwidth() / 2);
                                })
                                .attr("dy", ".35em")
                                .text(function (d) {
                                    return d.value;
                                })
                                .style("font-size", "10px")
                                .style("font-family", "arial");

                            svg.selectAll(".domain")
                                .style("opacity", "0.2");


                            //start legend
                            var legend = svg.selectAll(".legend")
                                .data(options.slice())
                                .enter().append("g")
                                .attr("class", "legend")
                                .attr("transform", function (d, i) {
                                    return "translate(" + i * 100 + ",0)";
                                });

                            legend.append("rect")
                                .attr("x", (width / 2) - 30)
                                .attr("y", height + 40)
                                .attr("width", 18)
                                .attr("height", 18)
                                .style("fill", color);

                            legend.append("text")
                                .attr("x", width / 2 - 40)
                                .attr("y", height + 49)
                                .attr("dy", ".35em")
                                .style("text-anchor", "end")
                                .text(function (d) {
                                    return d;
                                })
                                .style("font-size", "10px")
                                .style("font-family", "arial");
                        }
                        //end legend
                    </script>


        </div>
    </div>
</div>
@endsection

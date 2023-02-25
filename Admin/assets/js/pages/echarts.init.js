function getChartColorsArray(e) {
  if (null !== document.getElementById(e)) {
    var t = document.getElementById(e).getAttribute("data-colors");
    if (t)
      return (t = JSON.parse(t)).map(function (e) {
        var t = e.replace(" ", "");
        if (-1 === t.indexOf(",")) {
          var o = getComputedStyle(document.documentElement).getPropertyValue(
            t
          );
          return o || t;
        }
        var a = e.split(",");
        return 2 != a.length
          ? t
          : "rgba(" +
              getComputedStyle(document.documentElement).getPropertyValue(
                a[0]
              ) +
              "," +
              a[1] +
              ")";
      });
    console.warn("data-colors Attribute not found on:", e);
  }
}
var lineChartColors = getChartColorsArray("line-chart");
lineChartColors &&
  ((dom = document.getElementById("line-chart")),
  (myChart = echarts.init(dom)),
  (app = {}),
  (option = null),
  (option = {
    grid: {
      zlevel: 0,
      x: 50,
      x2: 50,
      y: 30,
      y2: 30,
      borderWidth: 0,
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(0,0,0,0)",
    },
    xAxis: {
      type: "category",
      data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisLine: { lineStyle: { color: "#8791af" } },
    },
    yAxis: {
      type: "value",
      axisLine: { lineStyle: { color: "#8791af" } },
      splitLine: { lineStyle: { color: "rgba(166, 176, 207, 0.1)" } },
    },
    series: [{ data: [820, 932, 901, 934, 1290, 1330, 1320], type: "line" }],
    color: lineChartColors,
  }),
  option && "object" == typeof option && myChart.setOption(option, !0));
var mixLineChartColors = getChartColorsArray("mix-line-bar");
mixLineChartColors &&
  ((dom = document.getElementById("mix-line-bar")),
  (myChart = echarts.init(dom)),
  (option = null),
  ((app = {}).title = "Data view"),
  (option = {
    grid: {
      zlevel: 0,
      x: 80,
      x2: 50,
      y: 30,
      y2: 30,
      borderWidth: 0,
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(0,0,0,0)",
    },
    tooltip: {
      trigger: "axis",
      axisPointer: { type: "cross", crossStyle: { color: "#999" } },
    },
    toolbox: {
      orient: "center",
      left: 0,
      top: 20,
      feature: {
        dataView: { readOnly: !1, title: "Data View" },
        magicType: {
          type: ["line", "bar"],
          title: { line: "For line chart", bar: "For bar chart" },
        },
        restore: { title: "restore" },
        saveAsImage: { title: "Download Image" },
      },
    },
    color: mixLineChartColors,
    legend: {
      data: ["Evaporation", "Precipitation", "Average temperature"],
      textStyle: { color: "#8791af" },
    },
    xAxis: [
      {
        type: "category",
        data: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        axisPointer: { type: "shadow" },
        axisLine: { lineStyle: { color: "#8791af" } },
      },
    ],
    yAxis: [
      {
        type: "value",
        name: "Water volume",
        min: 0,
        max: 250,
        interval: 50,
        axisLine: { lineStyle: { color: "#8791af" } },
        splitLine: { lineStyle: { color: "rgba(166, 176, 207, 0.1)" } },
        axisLabel: { formatter: "{value} ml" },
      },
      {
        type: "value",
        name: "Temperature",
        min: 0,
        max: 25,
        interval: 5,
        axisLine: { lineStyle: { color: "#8791af" } },
        splitLine: { lineStyle: { color: "rgba(166, 176, 207, 0.1)" } },
        axisLabel: { formatter: "{value} Ã‚Â°C" },
      },
    ],
    series: [
      {
        name: "Evaporation",
        type: "bar",
        data: [2, 4.9, 7, 23.2, 25.6, 76.7, 135.6, 162.2],
      },
      {
        name: "Precipitation",
        type: "bar",
        data: [2.6, 5.9, 9, 26.4, 28.7, 70.7, 175.6, 182.2],
      },
      {
        name: "Average Temperature",
        type: "line",
        yAxisIndex: 1,
        data: [2, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4],
      },
    ],
  }),
  option && "object" == typeof option && myChart.setOption(option, !0));
  
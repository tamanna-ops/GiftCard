function getChartColorsArray(e) {
  if (null !== document.getElementById(e)) {
    var t = document.getElementById(e).getAttribute("data-colors");
    if (t)
      return (t = JSON.parse(t)).map(function (e) {
        var t = e.replace(" ", "");
        if (-1 === t.indexOf(",")) {
          var r = getComputedStyle(document.documentElement).getPropertyValue(
            t
          );
          return r || t;
        }
        var o = e.split(",");
        return 2 != o.length
          ? t
          : "rgba(" +
              getComputedStyle(document.documentElement).getPropertyValue(
                o[0]
              ) +
              "," +
              o[1] +
              ")";
      });
    console.warn("data-colors Attribute not found on:", e);
  }
}
var lineChartDatalabelColors = getChartColorsArray("line_chart_datalabel");
lineChartDatalabelColors &&
  ((options = {
    chart: {
      height: 380,
      type: "line",
      zoom: { enabled: !1 },
      toolbar: { show: !1 },
    },
    colors: lineChartDatalabelColors,
    dataLabels: { enabled: !1 },
    stroke: { width: [3, 3], curve: "straight" },
    series: [
      
      { name: "C2", data: [10, 34, 12, 16, 23, 28, 30,14,18,22,6,9,15,23,14,12,22,16,18,19] },
      

    ],
    title: {
      text: "Committee Amount Taken Amount",
      align: "left",
      style: { fontWeight: "500" },
    },
    grid: {
      row: { colors: ["transparent", "transparent"], opacity: 0.2 },
      borderColor: "#f1f1f1",
    },
    markers: { style: "inverted", size: 6 },
    xaxis: {
      categories: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11","12","13","14","15","16","17","18","19","20"],
      title: { text: "Month" },
    },
    yaxis: { title: { text: "Committee Name" }, min: 5, max: 40 },
    legend: {
      position: "top",
      horizontalAlign: "right",
      floating: !0,
      offsetY: -25,
      offsetX: -5,
    },
    responsive: [
      {
        breakpoint: 600,
        options: { chart: { toolbar: { show: !1 } }, legend: { show: !1 } },
      },
    ],
  }),
  (chart = new ApexCharts(
    document.querySelector("#line_chart_datalabel"),
    options
  )).render());
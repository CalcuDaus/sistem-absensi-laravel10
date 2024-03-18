const ctx = document.getElementById("myChart");
// Bar Char
const plugin = {
  id: "customCanvasBackgroundColor",
  beforeDraw: (chart, args, options) => {
    const { ctx } = chart;
    ctx.save();
    ctx.globalCompositeOperation = "destination-over";
    ctx.fillStyle = options.color || "#eee";
    ctx.fillRect(0, 0, chart.width, chart.height);
    ctx.restore();
  },
};
const data = {
  labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",'Agustus','September','Oktober','November','Desember'],
  datasets: [
    {
      label: "Laporan Siswa Bulanan",
      data: [65, 60, 60, 81, 56, 55, 40,59, 80, 81, 56, 55, 40],
      backgroundColor: [
        "lightblue",
        "lightblue",
        "lightblue",
        "lightblue",
        "lightblue",
        "lightblue",
        "lightblue",
      ],
    },
  ],
};
new Chart(ctx, {
  type: "bar",
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
  plugins: [plugin],
});

// DOUGHNUT CHART

const dotctx = document.getElementById("doughnutChart");

const data2 = {
  labels: ["Red", "Blue", "Yellow"],
  datasets: [
    {
      label: "My First Dataset",
      data: [300, 50, 100],
      backgroundColor: [
        "rgb(255, 99, 132)",
        "rgb(54, 162, 235)",
        "rgb(255, 205, 86)",
      ],
      hoverOffset: 4,
    },
  ],
};

new Chart(dotctx, {
  type: "doughnut",
  data: data2,
  plugins: [plugin],
});

// Pie Chart
const piectx = document.getElementById("pieChart");

const data3 = {
  labels: ["Red", "Blue", "Yellow"],
  datasets: [
    {
      label: "My First Dataset",
      data: [300, 50, 100],
      backgroundColor: [
        "rgb(255, 99, 132)",
        "rgb(54, 162, 235)",
        "rgb(255, 205, 86)",
      ],
      hoverOffset: 4,
    },
  ],
};

new Chart(piectx, {
  type: "pie",
  data: data3,
  plugins: [plugin],
});

// Line Chart
const lineCtx = document.getElementById("lineChart");

new Chart(lineCtx, {
  type: "line",
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli"],
    datasets: [
      {
        label: "My First Dataset",
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: "#D946EF",
        tension: 0.1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        // defining min and max so hiding the dataset does not change scale range
        min: 0,
        max: 100,
      },
    },
  },
  plugins: [plugin],
});

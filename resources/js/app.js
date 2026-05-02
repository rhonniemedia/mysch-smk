import Alpine from "alpinejs";
import Chart from "chart.js/auto";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('a[href="#"]').forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            triggerGlobalModal({
                type: "warning",
                title: "Page Not Available",
                message: "This page hasn't been created yet.",
                confirmText: "Got it",
            });
        });
    });

    initCharts();
});

function triggerGlobalModal(options) {
    window.dispatchEvent(
        new CustomEvent("open-global-modal", { detail: options }),
    );
}

function initCharts() {
    // 1. Cek keberadaan canvas Growth Chart
    const growthEl = document.getElementById("growthChart");
    if (growthEl) {
        const growthCtx = growthEl.getContext("2d");
        new Chart(growthCtx, {
            type: "line",
            // ... (data dan options tetap sama)
        });
    }

    // 2. Cek keberadaan canvas Donut Chart (PENTING)
    const deptEl = document.getElementById("deptChart");
    if (deptEl) {
        const deptCtx = deptEl.getContext("2d");
        new Chart(deptCtx, {
            type: "doughnut",
            data: {
                labels: [
                    "Engineering",
                    "Sales",
                    "Marketing",
                    "Design",
                    "Other",
                ],
                datasets: [
                    {
                        data: [40, 25, 15, 10, 10],
                        backgroundColor: [
                            "#FF1443",
                            "#30B22D",
                            "#FED71F",
                            "#9333ea",
                            "#E5E7EB",
                        ],
                        borderWidth: 0,
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: "75%",
                plugins: {
                    legend: {
                        position: "right",
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            color: "#6A7686",
                            font: { family: "'Roboto', sans-serif", size: 12 },
                        },
                    },
                },
            },
        });
    }
}

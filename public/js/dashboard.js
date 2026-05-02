/**
 * dashboard.js
 * Lokasi: public/js/dashboard.js
 *
 * Cara link di blade (letakkan sebelum </body>):
 * <script src="{{ asset('js/dashboard.js') }}"></script>
 *
 * Pastikan Chart.js sudah di-load sebelum file ini.
 */

// ============================================
// Helper: Trigger Global Modal
// ============================================
/**
 * Memanggil Global Modal dari mana saja di JS.
 * @param {Object} options - { type, title, message, confirmText, cancelText, onConfirm }
 */
function triggerGlobalModal(options) {
    window.dispatchEvent(
        new CustomEvent("open-global-modal", { detail: options }),
    );
}

// ============================================
// DOMContentLoaded: Init semua listener & chart
// ============================================
document.addEventListener("DOMContentLoaded", function () {
    // Global Listener: Semua a href="#" akan memicu Page Not Found Modal otomatis!
    document.querySelectorAll('a[href="#"]').forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            triggerGlobalModal({
                type: "warning",
                title: "Page Not Available",
                message:
                    "This page hasn't been created yet. Generate it using the chat!",
                confirmText: "Got it",
            });
        });
    });

    // Init Charts
    initCharts();
});

// ============================================
// Charts: Employee Growth & Department Donut
// ============================================
function initCharts() {
    // --- Line Chart: Employee Growth ---
    const growthCtx = document.getElementById("growthChart").getContext("2d");
    new Chart(growthCtx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
            ],
            datasets: [
                {
                    label: "Employees",
                    data: [
                        980, 1020, 1050, 1080, 1120, 1150, 1190, 1210, 1235,
                        1248,
                    ],
                    borderColor: "#FF1443",
                    backgroundColor: "rgba(22, 93, 255, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#fff",
                    pointBorderColor: "#FF1443",
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: { color: "#E5E7EB", borderDash: [5, 5] },
                    ticks: {
                        color: "#6A7686",
                        font: { family: "'Roboto', sans-serif" },
                    },
                },
                x: {
                    grid: { display: false },
                    ticks: {
                        color: "#6A7686",
                        font: { family: "'Roboto', sans-serif" },
                    },
                },
            },
        },
    });

    // --- Doughnut Chart: Department Distribution ---
    const deptCtx = document.getElementById("deptChart").getContext("2d");
    new Chart(deptCtx, {
        type: "doughnut",
        data: {
            labels: ["Engineering", "Sales", "Marketing", "Design", "Other"],
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

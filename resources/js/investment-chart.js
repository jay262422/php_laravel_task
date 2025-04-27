import Chart from 'chart.js/auto';

window.onload = function() {
    function extractValue(id) {
        const text = document.getElementById(id)?.innerText || '';
        console.log('Fixed:', text);
        const number = text.replace(/[^\d.-]/g, ''); // Remove ₹, commas, etc
        return parseFloat(number) || 0;
    }

    const fixedDepositsTotal = extractValue('TotafixedDepositsl');
    const propertiesTotal = extractValue('Totalproperties');
    const stocksTotal = extractValue('Totalstocks');

    // 🛑 Print extracted values here
    console.log('Fixed Deposits:', fixedDepositsTotal);
    console.log('Properties:', propertiesTotal);
    console.log('Stocks:', stocksTotal);

    const canvas = document.getElementById('investmentChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Fixed Deposits', 'Properties', 'Stocks'],
            datasets: [{
                data: [fixedDepositsTotal, propertiesTotal, stocksTotal],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
};

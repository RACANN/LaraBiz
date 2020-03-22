var app = new Vue({
        el: '#reports',
        data: {
            total_labor_cost : '',
            total_labor_hours: '',
            total_sales: '',
            total_profits: '',
            total_sales_profits: ''
        },
        mounted(){
            this.getTotalLaborCost();
            this.getTotalTotalSales();
            this.getTotalLaborHours();
            this.getTotalLaborByEmployee();
            this.getSalesByCategory();
            this.getSalesProfits();
            this.getTotalProfits();
            $("#profitReports").hide();
            $("#salesReports").hide();
        },
        methods: {
            laborReports() {
                $("#salesReportsTab").removeClass('is-active');
                $("#profitReportsTab").removeClass('is-active');
                $("#laborReportsTab").addClass('is-active');

                $("#salesReports").hide();
                $("#profitReports").hide();
                $("#laborReports").show();
            },
            salesReports() {
                $("#laborReportsTab").removeClass('is-active');
                $("#profitReportsTab").removeClass('is-active');
                $("#salesReportsTab").addClass('is-active');

                $("#laborReports").hide();
                $("#profitReports").hide();
                $("#salesReports").show();
            },
            profitReports() {
                $("#salesReportsTab").removeClass('is-active');
                $("#laborReportsTab").removeClass('is-active');
                $("#profitReportsTab").addClass('is-active');

                $("#salesReports").hide();
                $("#laborReports").hide();
                $("#profitReports").show();
            },
            getTotalTotalSales(){
                $.ajax({
                    url : '/reports/sales/total',
                    method: 'GET'

                }).done(data => {
                    this.total_sales = data.sales;
                });
            },
            getTotalLaborCost(){
                $.ajax({
                    url : '/reports/labor/total/cost',
                    method: 'GET'

                }).done(data => {
                    this.total_labor_cost = data.cost;
                });
            },
            getTotalLaborHours(){
                $.ajax({
                    url : '/reports/labor/total/hours',
                    method: 'GET'

                }).done(data => {
                    this.total_labor_hours = data.hours;
                });
            },
            getTotalLaborByEmployee(){
                $.ajax({
                    url : '/reports/labor/total/employees',
                    method: 'GET'

                }).done(data => {
                    $("#labor_by_employee_report").append(data);
                    $("#labor_by_employee_report").DataTable();
                });
            },
            getSalesProfits(){
                $.ajax({
                    url : '/reports/total/sales/profits',
                    method: 'GET'

                }).done(data => {
                    this.total_sales_profits = data.sale_profits;
                });
            },
            getTotalProfits(){
                $.ajax({
                    url : '/reports/total/profits',
                    method: 'GET'

                }).done(data => {
                    this.total_profits = data.total_profits;
                });
            },
            getSalesByCategory(){
                $.ajax({
                    url : '/reports/sales/total/categories',
                    method: 'GET'

                }).done(data => {
                    $("#sales_by_category").append(data);
                    $("#sales_by_category").DataTable();
                });
            },
        }
    })
<style>
    .strawberry-card {
        border: none;
        background: linear-gradient(135deg, #FFC1CC, #FF6F91); /* Strawberry-inspired gradient */
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .strawberry-card-header {
        background: linear-gradient(135deg, #FF6F91, #FFC1CC); /* Inverse gradient for header */
        color: #FFFFFF;
        font-weight: bold;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .strawberry-card-header h6 {
        font-size: 1rem;
        margin: 0;
    }

    .strawberry-card-header .dropdown-toggle i {
        color: #FFFFFF;
    }

    .strawberry-card-body {
        background: #FFFFFF;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        padding: 20px;
    }

    .chart-area {
        position: relative;
        height: 300px;
    }

    .strawberry-card .dropdown-menu {
        background: #FFC1CC;
        border: none;
        color: #6B0023;
    }

    .strawberry-card .dropdown-menu .dropdown-header {
        color: #FFFFFF;
        font-weight: bold;
    }

    .strawberry-card .dropdown-menu a {
        color: #6B0023 !important; /* Dark strawberry for links */
    }

    .strawberry-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="col-xl-12 col-lg-12">
    <div class="strawberry-card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between strawberry-card-header" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.9);">
            <h6 class="m-0">Earnings Overview</h6>
        </div>
        <!-- Card Body -->
        <div class="strawberry-card-body" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.9);">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
    .blueberry-card {
        border: none;
        background: linear-gradient(135deg, #4682B4 , #1E90FF);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .blueberry-card-body {
        position: relative;
        padding: 20px;
    }

    .blueberry-card .text-info {
        color: #1E90FF !important;
    }

    .blueberry-card .text-gray-800 {
        color: #2F4F4F !important;
    }

    .text-xs {
        font-size: 0.85rem;
    }

    .h5 {
        font-size: 1.5rem;
    }

    .blueberry-progress {
        height: 8px;
        background: #F0F8FF; 
        border-radius: 5px;
        overflow: hidden;
    }

    .blueberry-progress-bar {
        background: #4169E1;
    }

    .blueberry-icon {
        position: absolute;
        top: -20px;
        right: -20px;
        background: #5F9EA0;
        padding: 15px;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .blueberry-icon i {
        color: #FFFFFF;
        font-size: 1.5rem;
    }

    .blueberry-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="blueberry-card h-100 py-2" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.9);">
        <div class="blueberry-card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Completed Orders</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-white">50%</div>
                        </div>
                        <div class="col">
                            <div class="blueberry-progress">
                                <div class="progress-bar blueberry-progress-bar" role="progressbar" 
                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blueberry-icon">
                    <i class="fas fa-clipboard-list"></i> <!-- Clipboard list icon -->
                </div>
            </div>
        </div>
    </div>
</div>

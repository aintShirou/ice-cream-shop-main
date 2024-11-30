<style>
    .ice-cream-card {
        border: none;
        background: linear-gradient(135deg, #FF6F61 , #FF3366); 
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .ice-cream-card-body {
        position: relative;
        padding: 20px;
    }

    .ice-cream-card .text-primary {
        color: #FF3366 !important;
    }

    .ice-cream-card .text-gray-800 {
        color: #4B2C2C !important;
    }

    .text-xs {
        font-size: 0.85rem;
    }

    .h5 {
        font-size: 1.5rem;
    }

    .ice-cream-icon {
        position: absolute;
        top: -20px;
        right: -20px;
        background: #FF6363;
        padding: 15px;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .ice-cream-icon i {
        color: #FFFFFF;
        font-size: 1.5rem;
    }

    .ice-cream-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="ice-cream-card h-100 py-2" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.9);">
        <div class="ice-cream-card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Earnings (Monthly)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">$40,000</div>
                </div>
                <div class="ice-cream-icon">
                    <i class="fas fa-ice-cream"></i> 
                </div>
            </div>
        </div>
    </div>
</div>

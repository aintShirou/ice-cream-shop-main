<style>
    .mango-card {
        border: none;
        background: linear-gradient(135deg, #FFA500 , #FF8C00); /* Mango-inspired gradient */
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .mango-card-body {
        position: relative;
        padding: 20px;
    }

    .mango-card .text-warning {
        color: #FF8C00 !important; /* Vibrant mango orange */
    }

    .mango-card .text-gray-800 {
        color: #4B3F00 !important; /* Deep brown for contrast */
    }

    .text-xs {
        font-size: 0.85rem;
    }

    .h5 {
        font-size: 1.5rem;
    }

    .mango-icon {
        position: absolute;
        top: -20px;
        right: -20px;
        background: #FF4500; /* Bold orange for the icon background */
        padding: 15px;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .mango-icon i {
        color: #FFFFFF;
        font-size: 1.5rem;
    }

    .mango-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="mango-card h-100 py-2" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.9);">
        <div class="mango-card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Pending Orders
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">18</div>
                </div>
                <div class="mango-icon">
                    <i class="fas fa-comments"></i> <!-- Chat bubble icon -->
                </div>
            </div>
        </div>
    </div>
</div>

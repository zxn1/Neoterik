<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <title>Penyelenggaraan | UPSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Lato", Arial, sans-serif;
            font-size: 16px;
            line-height: 1.8;
            font-weight: normal;
        }

        * {
            box-sizing: border-box;
        }

        /* HEADER */
        .site-header {
            width: 100%;
            background-color: #ffffff;
            padding: 10px 30px;
            border-bottom: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .site-header .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .site-header img {
            height: 40px;
        }

        .site-header .university-name {
            font-weight: 600;
            font-size: 18px;
            color: #222;
        }

        .site-header .datetime {
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }

        /* MAINTENANCE SECTION */
        .maintenance {
            background-image: url(https://demo.wpbeaveraddons.com/wp-content/uploads/2018/02/main-1.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 100px 20px 20px;
        }

        .maintenance_contain {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
        }

        .maintenance_contain img {
            width: auto;
            max-width: 100%;
        }

        .pp-infobox-title-prefix {
            font-weight: 500;
            font-size: 20px;
            color: #000000;
            margin-top: 30px;
            text-align: center;
        }

        .pp-info-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 25px 30px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            max-width: 600px;
            width: 100%;
            text-align: left;
            position: relative;
        }

        .mac-buttons {
            position: absolute;
            top: 15px;
            left: 20px;
            display: flex;
            gap: 8px;
        }

        .mac-button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .red {
            background-color: #ff5f57;
        }

        .yellow {
            background-color: #febc2e;
        }

        .green {
            background-color: #28c840;
        }

        .pp-infobox-title {
            color: #000000;
            font-weight: 700;
            font-size: 24px;
            margin-top: 30px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pp-infobox-description p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pp-infobox-description i,
        .pp-infobox-title i {
            color: #888888;
            font-size: 18px;
        }

        @media (max-width: 600px) {
            .site-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .site-header .university-name {
                font-size: 16px;
            }

            .pp-infobox-title {
                font-size: 20px;
            }

            .pp-infobox-description p {
                font-size: 14px;
            }

            .mac-buttons {
                top: 12px;
                left: 15px;
                gap: 6px;
            }

            .mac-button {
                width: 10px;
                height: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <div class="site-header">
        <div class="logo-section">
            <img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" alt="UPSI Logo">
            <div class="university-name">Sekolah Rendah Seri Budiman</div>
        </div>
        <div class="datetime" id="datetime">
            <!-- JS will populate this -->
        </div>
    </div>

    <!-- MAINTENANCE CONTENT -->
    <div class="maintenance">
        <div class="maintenance_contain">
            <img src="https://demo.wpbeaveraddons.com/wp-content/uploads/2018/02/main-vector.png" alt="maintenance">
            <span class="pp-infobox-title-prefix">KAMI AKAN KEMBALI SEGERA</span>

            <div class="pp-info-box">
                <div class="mac-buttons">
                    <div class="mac-button red"></div>
                    <div class="mac-button yellow"></div>
                    <div class="mac-button green"></div>
                </div>

                <div class="pp-infobox-title">
                    <i class="fas fa-wrench"></i> Laman web ini sedang dalam penyelenggaraan!
                </div>
                <div class="pp-infobox-description">
                    <p><i class="fas fa-sync-alt"></i> Sistem sedang dinaik taraf untuk memberikan pengalaman yang lebih baik kepada anda.</p>
                    <p><i class="fas fa-clock"></i> Sila kembali semula dalam masa terdekat.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            };
            const time = now.toLocaleTimeString('ms-MY');
            const date = now.toLocaleDateString('ms-MY', options);
            document.getElementById('datetime').textContent = `${time} | ${date}`;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>

</html>

<body>
    <!--  -->
    <div class="info-container">
        <h1 class="info-title">Thông tin cá nhân</h1>
        <table class="info-table">
            <tr class="info-row">
                <th class="info-col-title">Họ tên:</th>
                <td class="info-col">Bùi Văn Thuận</td>
            </tr>
            <tr class="info-row">
                <th class="info-col-title">Email:</th>
                <td class="info-col">buivanthuan@gmail.com.vn</td>
            </tr>
            <tr class="info-row">
                <th class="info-col-title">Số điện thoại:</th>
                <td class="info-col">0327437343</td>
            </tr>
            <tr class="info-row">
                <th class="info-col-title">Giới tính:</th>
                <td class="info-col">Nam</td>
            </tr>
            <tr class="info-row">
                <th class="info-col-title">Địa chỉ:</th>
                <td class="info-col">Ấp BÌnh Huề 1, xã Đại Hòa Lộc, huyện Binh Đại, tỉnh Bến Tre</td>
            </tr>
            <tr class="info-row-btn">
                <td class="col-btn">
                    <button class="change-info-btn">Thay đổi thông tin</button>
                </td>
                <td class="col-btn">
                    <button class="change-info-btn">Đổi mật khẩu</button>
                </td>
            </tr>
        </table>

    </div>
</body>

<style>
    .info-container {
        position: relative;
        width: 100%;
        background-color: #f8f8f8;
        font-family: 'Montserrat',-apple-system,BlinkMacSystemFont,sans-serif;
        align-items: center;
        padding: 32px 0;
    }
    .info-title {
        text-align: center;
        padding: 8px;
        text-transform: uppercase;
    }
    .info-table {
        width: 60%;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        font-size: 1.2rem;
        background-color: #fff;
        margin: auto;
        padding: 8px;
        border-radius: 5px;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
    }
    .info-col-title {
        text-align: right;
        padding-right: 16px;
    }
    .info-row-btn {
        width: 100%;
        display: flex;
        margin-top: 16px;
        margin-bottom: 16px;
        align-items: center;
    }
    .col-btn {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .change-info-btn {
        /* text-transform: uppercase; */
        font-weight: 500;
        width: 200px;
        padding: 12px;
        font-size: 1rem;
        color: #fff;
        background-color: #161a21;
        border: none;
        border-radius: 2px;
    }
    .change-info-btn:hover {
        color: #ccc;
        cursor: pointer;
    }
</style>
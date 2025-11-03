I. Ảnh minh hoạ quá trình thực hiện
<img width="1168" height="370" alt="image" src="https://github.com/user-attachments/assets/fcc303d4-78e8-4b71-a8a1-cd90851cb7b9" />
<img width="1894" height="1066" alt="image" src="https://github.com/user-attachments/assets/daf57d30-f47e-44ec-838b-31603242f914" />
<img width="1636" height="772" alt="image" src="https://github.com/user-attachments/assets/051eda55-e787-467e-988d-090c7b3f0314" />
<img width="1646" height="758" alt="image" src="https://github.com/user-attachments/assets/e40820db-9224-426d-a16a-78bfbd835789" />

<img width="1646" height="1086" alt="image" src="https://github.com/user-attachments/assets/f5a24260-11a4-42ae-a3a5-73605825f532" />
<img width="1646" height="1810" alt="image" src="https://github.com/user-attachments/assets/045fa81b-f365-4d8b-9b9f-37eabfc5a25f" />
<img width="1646" height="1810" alt="image" src="https://github.com/user-attachments/assets/f6aa8fe1-0545-4297-b50d-aeec6ff1d553" />
<img width="1646" height="1810" alt="image" src="https://github.com/user-attachments/assets/aa67e3c8-8c5a-492a-a933-5f725e70ab2d" />
<img width="1646" height="1220" alt="image" src="https://github.com/user-attachments/assets/fa9a6412-19ca-43d3-82fb-fb25ac675b58" />
<img width="1644" height="808" alt="image" src="https://github.com/user-attachments/assets/dfa4db6e-fb2f-49b6-9cee-c5958c6266de" />
<img width="1644" height="258" alt="image" src="https://github.com/user-attachments/assets/f48b3b37-0392-406f-8839-24fd3fa4e7bf" />


====Bài tập ôn luyện====


Bài8: 

<img width="610" height="226" alt="image" src="https://github.com/user-attachments/assets/1043bc14-4523-4224-99af-db68c651c2c0"/>




giải thích: 
Khi ta bỏ qua (exclude) một route khỏi middleware VerifyCsrfToken, nghĩa là Laravel không còn kiểm tra mã xác thực (CSRF token) cho request đó nữa.
Điều này mở ra nguy cơ cho các cuộc tấn công kiểu Cross-Site Request Forgery (CSRF).
🔐 1. CSRF là gì?
CSRF (Cross-Site Request Forgery) là kiểu tấn công trong đó kẻ xấu lợi dụng trình duyệt của người dùng đã đăng nhập để gửi yêu cầu trái phép đến máy chủ ứng dụng.
Vì trình duyệt vẫn lưu cookie session, máy chủ sẽ tin rằng yêu cầu là từ người dùng hợp lệ.
Ví dụ:
Bạn đang đăng nhập vào trang yourapp.com.
Kẻ tấn công tạo một trang độc hại có form:
<form action="https://yourapp.com/api/webhook-test" method="POST">
    <input type="hidden" name="message" value="Hacked!">
</form>
<script>document.forms[0].submit();</script>
Khi bạn mở trang độc hại này, trình duyệt tự động gửi request đến /api/webhook-test kèm cookie đăng nhập của bạn.
Nếu route này không có CSRF bảo vệ, request đó được chấp nhận và thực thi như thể bạn tự gửi.

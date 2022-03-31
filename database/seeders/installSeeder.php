<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class installSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner')->insert([
            ['id'=>1,'tieude'=>'SPA & BEAUTY','noidung'=> 'Nơi Gửi Gắm Niềm Tin Của Phái Đẹp', 'img'=>'spa-01.jpg', 'AnHien'=>1],
            ['id'=>2,'tieude'=>'SPA & BEAUTY','noidung'=> 'Nơi Gửi Gắm Niềm Tin Của Phái Đẹp', 'img'=>'spa-02.jpg', 'AnHien'=>1]
        ]);

        DB::table('coso')->insert([
            ['id'=>1,'name'=>'Cơ sở 1','diachi'=> '55A – Đường 3/2 – Phường 11 – Quận 10 – TP. Hồ Chí Minh', 'tinh'=>'4', 'quan'=>'43', 'huyen'=>'1343'],
            ['id'=>2,'name'=>'Cơ sở 2','diachi'=> '18A Ngô Văn Năm, Quận 1, Thành phố Hồ Chí Minh', 'tinh'=>'4', 'quan'=>'43', 'huyen'=>'1343'],
            ['id'=>3,'name'=>'Cơ sở 3','diachi'=> 'Tầng 3 Tòa Udic Complex, Hoàng Đạo Thúy, Hà Nội', 'tinh'=>'4', 'quan'=>'43', 'huyen'=>'1343']
        ]);
        DB::table('danhmuc')->insert([
            ['id' => 1, 'name'=>'Chăm sóc da mặt','img'=>'photo-1635608885.jpg','slug'=> Str::slug('Chăm sóc da mặt', '-'), 'loai'=>'1'],
            ['id' => 2, 'name'=>'Điều trị mụn, sẹo','img'=>'photo-1635608926.jpg','slug'=> Str::slug('Điều trị mụn, sẹo', '-'), 'loai'=>'1'],
            ['id' => 3, 'name'=>'Dịch vụ trị nám, tàn nhang','img'=>'photo-1635608979.jpg', 'slug'=> Str::slug('Dịch vụ trị nám', '-'), 'loai'=>'1'],
            ['id' => 4, 'name'=>'Làm trẻ hóa da','img'=>'photo-1635609024.jpg','slug'=> Str::slug('Làm trẻ hóa da', '-'), 'loai'=>'1'],
            ['id' => 5, 'name'=>'Dịch vụ massage','img'=>'photo-1635609047.jpg','slug'=> Str::slug('Dịch vụ massage', '-'), 'loai'=>'1'],
            ['id' => 6, 'name'=>'Dịch vụ giảm béo','img'=>'photo-1635609071.jpg','slug'=> Str::slug('Dịch vụ giảm béo', '-'), 'loai'=>'1'],
            ['id' => 7, 'name'=>'Làm đẹp','img'=>'photo-1635609118.jpg','slug'=> Str::slug('Làm đẹp', '-'), 'loai'=>'2'],
            ['id' => 8, 'name'=>'Trắng da','img'=>'photo-1635609158.jpg','slug'=> Str::slug('Trắng da', '-'), 'loai'=>'3'],
            ['id' => 9, 'name'=>'Maybelline','img'=>'photo-1635609158.jpg','slug'=> Str::slug('maybelline', '-'), 'loai'=>'4'],
        ]);
        DB::table('dichvu')->insert([
            ['id'=>1,'name'=>'Xăm Chân Mày', 'slug' => Str::slug('Xăm Chân Mày'), 'img'=>'xam_chan_may.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Xăm chân mày là hình thức dùng mũi kim thẩm mỹ đưa một lượng chất, mực tạo màu vào dưới da chân mày. ', 'dongia'=>2000000, 'noidung'=>'Xăm chân mày là hình thức dùng mũi kim thẩm mỹ đưa một lượng chất, mực tạo màu vào dưới da chân mày. Bạn có thể hình dung đây là phương pháp tương tự như việc xăm tattoo lên cơ thể vậy. Chuyên viên sẽ vẽ khung chân mày trước sau đó sử dụng kim chuyên dụng đưa mực xuyên sâu qua da để hoàn thiện theo khuôn chân mày. ', 'trangthai'=> 1],
            ['id'=>2,'name'=>'Spa Điều Trị Mụn', 'slug' => Str::slug('Spa Điều Trị Mụn'), 'img'=>'dieu_tri_mun.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Ở trên đã giới thiệu về phun xăm thẩm mỹ chân mày, môi rồi phải không? Nhưng chắc chắn nhiều bạn cũng sẽ không quan tâm nhiều bằng dịch vụ spa này đâu đúng không? ', 'dongia'=>4000000, 'noidung'=>'Ở trên đã giới thiệu về phun xăm thẩm mỹ chân mày, môi rồi phải không? Nhưng chắc chắn nhiều bạn cũng sẽ không quan tâm nhiều bằng dịch vụ spa này đâu đúng không? Đó là điều trị mụn như thế nào an toàn nhất, chất lượng nhất cho làn da cũng như sức khỏe của mình. Vì hiện nay xã hội phát triển và quá nhiều thứ trong không khí bị ô nhiễm mà làn da lại “được hưởng” một cách trực tiếp nhất hằng ngày, hằng giờ, chính vì thế mụn rất dễ được sinh ra. Vậy là cách nào để đến với dịch vụ spa và chọn đúng, chuẩn phương pháp điều trị mụn để tránh tiền mất tật mua? An tâm bên Miss Tram đều có gợi ý cho bạn sau đây.

            Dịch vụ điều trị mụn phù hợp cho từng loại mụn, loại da tại Miss Trâm

            Thoa kem trị mụn, uống thuốc kháng sinh
            Phương pháp này có ưu điểm là giúp giảm mụn khá nhanh nếu da bạn phù hợp với kem trị mụn hay cơ thể thích ứng với thuốc kháng sinh.

            Nhược điểm:

            + Sau khi ngưng kem thoa hoặc hết liệu trình uống thuốc mụn sẽ tái lại nặng hơn ban đầu.

            + Da dần kháng lại với kem tri mụn nếu thoa duy trì trong thời gian quá lâu



            + Uống thuốc kháng sinh khiến cơ thể bạn mệt mỏi, thân nhiệt nóng, môi khô bong tróc và ảnh hưởng đến sức khỏe nếu dùng thuốc kháng sinh quá thời gian quy định.

            + Note: Một trong số các nguyên nhân bị mụn đó chính là da bị chứa và tích tụ quá nhiều các độc tố, vậy thì việc thải độc tố ra cho da cực kì quan trọng. Miss Trâm có liệu trình thải độc tố vậy thì đánh giá về liệu trình ấy như thế nào? Có tốt không? Bạn cùng tham khảo tại đây.

            Điều trị mụn bằng công nghệ kích hoạt vi điểm Laser CO2 Fractional
            Đối với phương pháp này thì có khá nhiều các ưu điểm cần đề cập?

            + Công nghệ kích hoạt vi điểm Laser Fractional CO2 là bước đột phá công nghệ trong lĩnh vực phục hồi và điều trị da mụn – sẹo rỗ. Với bước sóng 10.600 nm có khả năng tác động sâu vào lớp hạ bì mà không gây xâm lấn vùng da lành xung quanh.



            + Loại bỏ vi khuẩn gây mụn, điều tiết chất nhờn trên da và kháng khuẩn.



            + Laser CO2 giúp kích thích mô tăng sinh collagen làm đầy vùng da mụn sẹo, đồng thời cải thiện các vấn đề da mặt, giúp da săn chắc, giảm vết thâm nám, vết nhăn, da mịn màng và tươi trẻ hơn..

            + Không chỉ điều trị sạch mụn, thâm mà còn giúp da trắng hồng mịn màng, se khít lỗ chân lông và tái tạo da sáng khỏe.

            + Mức độ mụn tái phát thấp và hạn chế tối đa tình trạng mụn viêm khi tái phát.

            Nhược điểm:

            + Hiệu quả điều trị phụ thuộc rất nhiều vào thế hệ máy của từng cơ sở và sản phẩm điều trị sau khi kích hoạt vi điểm.

            + Chi phí điều trị khá cao so với điều trị mụn thông thường.

            Điều trị mụn bằng công nghệ Green Laser/Blue Light, Công nghệ Oxy Jet, Công nghệ Nano Skin, Công nghệ Bio Light
            Ưu điểm:

            + Giải quyết được tình trạng mụn trong thời gian ngắn, ánh sáng sinh học giúp phá hủy cồi mụn, tiêu diệt vi khuẩn, giải tỏa tắc nghẽn lỗ chân lông – nguồn sản sinh ra mụn, giảm viêm.

            + Dễ dàng kiểm soát những nốt mụn vừa mới hình thành

            + Chi phí điều trị khá rẻ, phù hợp với mọi độ tuổi

            Nhược điểm: Chỉ giải quyết được tình trạng mụn trên bề mặt da. Bạn nên duy trì chăm sóc da thường xuyên để kiểm soát nốt mụn mới càng sớm càng tốt.', 'trangthai'=> 1],
            ['id'=>3,'name'=>'Xăm Môi Truyền Thống', 'slug' => Str::slug('Xăm Môi Truyền Thống'), 'img'=>'xam_moi_truyen_thong.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Thường thì đối với các tỉnh lẻ, không phải nằm thành phố lớn như Hồ Chí Minh, Hà Nội, Cần Thơ, Đà Nẵng thì phương pháp này được sử dụng khá nhiều, ', 'dongia'=>3000000, 'noidung'=>'Thường thì đối với các tỉnh lẻ, không phải nằm thành phố lớn như Hồ Chí Minh, Hà Nội, Cần Thơ, Đà Nẵng thì phương pháp này được sử dụng khá nhiều, vì với viêc cập nhật kiến thức, kỹ thuật và đầu tư máy móc ở các tỉnh của các chủ tiệm spa, thẩm mỹ viện hầu như không có. Với xăm môi truyền thống, chuyên viên sẽ dùng kim đâm xuyên qua lớp sừng, sau đó thoa đều mực xăm lên hoặc lấy mũi kim nhúng vào mực trước rồi lăn lên da. Màu sắc sau khi xăm môi sẽ đậm hơn, mực xăm lại không được tự nhiên cho lắm, khi nhìn vào dễ phát hiện ra dấu tích thẩm mỹ.', 'trangthai'=> 1],
            ['id'=>4,'name'=>'Spa Điều Trị Mụn Lưng', 'slug' => Str::slug('Spa Điều Trị Mụn Lưng'), 'img'=>'dieu_tri_mun_lung.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Điều trị mụn lưng, đọc đến đây có bạn sẽ hỏi sao không gộp vào điều trị mụn ở trên? Không vì điều trị mụn lưng nó thành một mảng khác so với điều trị mụn ở trên là nói về điều trị mụn trên mặt rồi. ', 'dongia'=>3500000, 'noidung'=>'Điều trị mụn lưng, đọc đến đây có bạn sẽ hỏi sao không gộp vào điều trị mụn ở trên? Không vì điều trị mụn lưng nó thành một mảng khác so với điều trị mụn ở trên là nói về điều trị mụn trên mặt rồi. Vậy thì hãy cùng khám phá xem có bao nhiêu cách, công nghệ điều trị mụn lưng lại dịch vụ spa làm đẹp Miss Trâm nào?

            Dịch vụ spa điều trị mụn lưng

            Kiểm Soát Mụn – Viêm Nang Lông Với Ánh Sáng Sinh Học Omega Light
            Ngày nay, sự phát triển của y học và công nghệ hiện đại đã cho ra đời nhiều phương pháp trị mụn lưng – viêm nang lông nhanh chóng. Trong đó, điều trị mụn lưng bằng ánh sáng sinh học Omega Light đã được FDA (Mỹ) chứng nhận về hiệu quả và độ an toàn.

            Kiểm Soát Mụn – Viêm Nang Lông Với Laser CO2 Fractional
            Phương pháp loại bỏ tuyệt đối tình trạng mụn, viêm nang lông, thâm đen, mang lại hiệu quả cao, kể cả đối với tình trạng thâm mụn lưng lâu năm. Công nghệ laser Fractionla Co2 được FDA Hoa Kỳ chứng nhận về độ an toàn và hiệu quả đối với người cần điều trị.

            Hiệu quả tái tạo làn da, kích thích tăng sinh collagen, trẻ hóa làn da giúp làn da trắng hồng tự nhiên. Thời gian liệu trình điều trị mụn, thâm, viêm nang lông ngắn hơn nhiều so với các phương pháp khác. Không cần kiêng khem, không mất thời gian nghỉ dưỡng sau điều trị.

            Kiểm Soát Mụn – Viêm Nang Lông Với Công nghệ Phi Kim/Lăn Kim
            Phương pháp phi kim, lăn kim chính là sử dụng các đầu kim có kích thước siêu nhỏ để tạo nên những tổn thương giả siêu nhỏ trên vùng da lưng, những vi điểm này sẽ kích thích cơ chế làm lành tự nhiên của da, từ đó làn da được tái tạo, tăng sinh collagen gấp 1000% lần, cũng như giúp làn da hấp thụ dưỡng chất lên tới 3000% lần so với các liệu pháp chăm sóc da thông thường.

            Phi kim, lăn kim vi điểm còn góp phần kích thích tái tạo biểu bì, tăng sinh Keratinocyte (lớp sừng của da) và các tế bào gốc. Khi đó, lớp Keratin được đẩy lên trên và hình thành một lớp gọi là thượng bì bảo vệ cơ thể dưới tác động của môi trường xung quanh.

            ', 'trangthai'=> 1],
            ['id'=>5,'name'=>'Spa Trẻ Hóa Da Tự Nhiên', 'slug' => Str::slug('Spa Trẻ Hóa Da Tự Nhiên'), 'img'=>'tre_hoa_da.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Da bạn bị lão hóa? Theo thời gian xã hội phát triển thì tỷ lệ ngược với da của bạn lão hóa càng nhanh và càng trẻ hóa độ tuổi ra. Vậy làm thế nào? Chả nhẽ cứ là đi phẩu thuật hay sao?', 'dongia'=>3000000, 'noidung'=>'Da bạn bị lão hóa? Theo thời gian xã hội phát triển thì tỷ lệ ngược với da của bạn lão hóa càng nhanh và càng trẻ hóa độ tuổi ra. Vậy làm thế nào? Chả nhẽ cứ là đi phẩu thuật hay sao? Không không,… Bí quyết cho bạn dịch vụ spa làm đẹp trẻ hóa da tự nhiên từ Miss Tram như sau:

            Dịch vụ spa trẻ hóa da tự nhiên tại thẩm mỹ viện miss tram

            Trẻ hóa da bằng phương pháp Thay da hóa học
            Thay da hóa học là một cách khác tái tạo bề mặt da. Các chuyên gia thẩm mỹ dùng một dung dịch và thoa lên da trong một khoảng thời gian nhất định, sau đó làn da bên ngoài tróc đi và kích thích tế bào da mới xuất hiện.

            Trẻ hóa da bằng PRP
            PRP (Platelet Rich Plasma) còn được gọi là phương pháp trẻ hóa lấy máu tự thân. Trong tiểu cầu của huyết tương trong máu có chứa các tế bào gốc có khả năng làm mới chính mình và kích thích sản sinh thêm các tế bào mới. Huyết tương sau khi được tách ra khỏi máu bằng máy li tâm sẽ được kích thích để sản sinh ra thêm các tế bào gốc. Sau đó, huyết tương sẽ được cấy vào tế bào da theo phương pháp lăn kim máy.

            Trẻ hóa da bằng Laser
            Laser là phương pháp thông dụng ở nhiều cơ sở thẩm mỹ hiện nay khi sử dụng tia sóng ánh sáng tác động vào da như laser CO2, laser Toning, laser Fraxel Repair… giúp loại bỏ các lớp da bên ngoài, kích thích vùng da bên dưới tạo ra collagen, giúp da săn chắc hơn.

            Trẻ hóa da với Công nghệ HiFu S+ (High Intensity Focus Ultrasound)
            Công nghệ Hifu là công nghệ duy nhất hiện nay sử dụng bước sóng có thể đi vào tới độ sâu 3.0-4.5mm dưới bề mặt da. Đây được coi là khu vực sản sinh nhiều nhất collagen và elastin – các tế bào giúp da săn chắc, căng tràn và tươi trẻ. Sau khi đi sâu vào tận cùng lớp hạ bì, sóng siêu âm hội tụ cường độ cao sẽ phát tán năng lượng, săn gọn các mô cơ.', 'trangthai'=> 1],
            ['id'=>6,'name'=>'Dịch Vụ Giảm Béo', 'slug' => Str::slug('Dịch Vụ Giảm Béo'), 'img'=>'giam_beo.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Hiện nay vấn đề giảm cân đang trở nên rất HOT và sôi động trên các cộng đồng về sức khỏe, tập gym, thậm chí là ở các fb cá nhân. Đang có sự biến đổi... ', 'dongia'=>3000000, 'noidung'=>'Tăng cân, béo phì là vấn đề mà rất nhiều chị em lo lắng, việc chăm lo cho vóc dáng dường như đã trở thành nhu cầu thiết yếu của con người trong cuộc sống hiện đại.

            Do đó, giảm béo là một trong những loại hình dịch vụ “hot” nhất tại các Spa hiện nay.

            Khi biết được nhu cầu làm đẹp cũng như các dịch vụ mang đến nhiều khách hàng như thế thì chẳng có lý gì mà các Spa có thể bỏ qua cả.', 'trangthai'=> 1],

        ]);

        DB::table('nhanvien')->insert([
            ['id'=>1,'idcoso'=>1, 'email'=>'ngoanhquoc@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Ngô Anh Quốc', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>2,'idcoso'=>1, 'email'=>'longnh.2401@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Long', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>3,'idcoso'=>1, 'email'=>'tuong2712@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Tưởng', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>4,'idcoso'=>1, 'email'=>'nhanvien@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'nhân viên', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>5,'idcoso'=>1, 'email'=>'tranquangnhan1606@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Nhân', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>6,'idcoso'=>1, 'email'=>'thuhuyendev01@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Thu Huyền', 'img'=>'', 'namsinh'=> 2001,'gioitinh'=> 0, 'sdt'=> '012345678', 'avatar'=>'huyen.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-10-03 20:56:18','updated_at'=> NULL],
        ]);
        DB::table('giamgia')->insert([
            ['id'=>1,'name'=>'MAXSALE150','ma'=>'FB01', 'number'=>5,'max'=> 150000,'loai'=>1 ,'ngaytao'=>'1635699600' ,'ngayhethan'=>'1637341200','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>2,'name'=>'MAXSALE250','ma'=>'FB02', 'number'=>250000,'max'=> 950000,'loai'=>0 ,'ngaytao'=>'1637686800' ,'ngayhethan'=>'1640883600','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>3,'name'=>'MAXSALE200','ma'=>'FB03', 'number'=>10,'max'=> 200000,'loai'=>1 ,'ngaytao'=>'1635958800' ,'ngayhethan'=>'1638205200','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
        ]);
        DB::table('khachhang')->insert([
            ['id'=>1,'name' => 'Long','idcoso' => 1, 'sdt'=> '0965286055','email'=>'long@gmail.com','password' => bcrypt('123123'), 'active' => 1, 'img' => 'a2c0894d9a3e77602e2f.jpg'],
            ['id'=>2,'name' => 'Nhân','idcoso' => 1, 'sdt'=> '0965286056','email'=>'nhan@gmail.com', 'password' => bcrypt('123123'), 'active' => 1, 'img' => '88e5bb095c89b1d7e898.jpg'],
            ['id'=>3,'name' => 'Ly Ly','idcoso' => 1, 'sdt'=> '0965286057', 'email'=>'lyly@gmail.com','password' => bcrypt('123123'), 'active' => 1, 'img' => 'khachhang1.jpg'],
            ['id'=>4,'name' => 'Hương Hương','idcoso' => 1, 'sdt'=> '0965286058', 'email'=>'huonghuong@gmail.com', 'password' => bcrypt('123123'), 'active' => 1, 'img' => 'khachhang5.jpg'],
            ['id'=>5,'name' => 'Thảo','idcoso' => 1, 'sdt'=> '0965286059', 'email'=>'thao@gmail.com', 'password' => bcrypt('123123'), 'active' => 1, 'img' => 'khachhang6.jpg'],
            ['id'=>6,'name' => 'Thảo Mai','idcoso' => 1, 'sdt'=> '0965286060', 'email'=>'thaomai@gmail.com', 'password' => bcrypt('123123'), 'active' => 1, 'img' => 'khachhang7.jpg']
        ]);
        DB::table('blog')->insert([
            ['id'=>1,'iddm' => '8', 'img' => 'dieu_tri_mun_uc_che.jpg', 'name' => 'DR.Seoul trị và ức chế mụn VAS 4.0 cho da mụn và nhạy cảm', 'slug' => Str::slug('DR.Seoul trị và ức chế mụn VAS 4.0 cho da mụn và nhạy cảm', '-'),'motangan'=>'Seoul Trị và ức chế Mụn VAS 4.0 – Một trong những liệu trình chăm sóc và điều trị mới nhất dành cho những khách hàng gặp phải vấn đề mụn tại Seoul Spa.', 'noidung' => 'Ưu điểm của liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0
            Với sự nâng cấp công nghệ nhằm bắt kịp với xu hướng thẩm mỹ trên thế giới, liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0 tỏ ra vô cùng vượt trội và phù hợp với nhiều khách hàng tại Seoul Spa bởi:

            Có khả năng ngăn chặn tối đa nguy cơ xuất hiện mụn trên da
            Chúng ta đều biết rằng bã nhờn và bụi bẩn gây bít tắc lỗ chân lông trong thời gian dài có thể dẫn tới việc xuất hiện mụn và các vấn đề về da. Chính vì vậy mà liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0 tỏ ra vô cùng hiệu quả khi giải quyết tận gốc vấn đề này ngay từ đầu.

            Khách hàng lựa chọn liệu trình điều trị mụn này có thể loại bỏ tối đa nguy cơ gây ra mụn nhờ bước hút dầu, xông hơi mặt để thải độc và làm sạch toàn bộ bề mặt và cặn bẩn khỏi những vị trí lỗ chân lông trên da.

            Liệu trình điều trị an toàn, không gây đau
            Hầu hết những liệu trình điều trị mụn thường thấy sẽ lấy nhân mụn và gây ra những vết thương, khiến khách hàng cảm thấy đau đớn khó chịu trong suốt quá trình thực hiện.

            Nếu lựa chọn DR. Seoul Trị và ức chế Mụn VAS 4.0, khách hàng không phải lo lắng về nguy cơ viêm nhiễm hay đau đớn bởi chuyên viên kỹ thuật sẽ nhanh chóng tiến hành sát khuẩn kỹ càng bề mặt da và ủ tê thuốc tê. Ngoài ra sau khi lấy nhân mụn cũng sẽ điện cam da lại thêm một lần nữa để giảm sưng và kháng viêm tuyệt đối.

            Liệu trình điều trị toàn diện với đầy đủ các bước
            Liệu trình điều trị toàn diện với đầy đủ các bước
            Tương thích với nhiều đối tượng khách hàng
            Chính vì vậy mà liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0 tại Seoul Spa được nâng cấp bằng công nghệ mới nhất, phù hợp để sử dụng cho nhiều đối tượng khách hàng khác nhau, điều trị đa dạng các loại mụn, tương thích với nhiều loại da nhờ việc điều chỉnh linh hoạt trong quá trình phi kim dưỡng chất cho da. Đây là thế mạnh của liệu pháp trị mụn công nghệ cao mà các cơ sở thẩm mỹ chăm sóc da thông thường không thể sánh kịp.

            Không cần lo ngại về tình trạng tổn thương da sau khi trị mụn
            Với quy trình điều trị chặt chẽ và đầy đủ các bước theo nguyên tắc khoa học, khách hàng có thể tránh khỏi nguy cơ bị thâm da hoặc tổn thương da do phi kim dưỡng chất nhờ chăm sóc và xử lý bề mặt da bằng dung dịch sát khuẩn và dưỡng chất một cách kịp thời.

            Sau khi thực hiện liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0, tốc độ hồi phục của da khỏi những tổn thương do điều trị mụn cũng được rút ngắn một cách đáng kể. Đồng thời tăng cường khả năng kháng khuẩn cũng như hấp thụ dưỡng chất của làn da nhờ mặt nạ phục hồi và mặt nạ ánh sáng sinh học. Liệu trình điều trị thực hiện nhanh gọn, mang lại hiệu quả rõ rệt và lâu dài dành cho khách hàng khi lựa chọn trị mụn công nghệ cao tại Seoul Spa.

            Những ai nên thực hiện liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0?
            Ra đời với mục đích điều trị và ức chế mụn, liệu trình DR.Seoul đặc biệt phù hợp với:

            Những khách hàng gặp phải tình trạng mụn dai dẳng, mụn kéo dài không thể điều trị dứt điểm.
            Những khách hàng có làn da nhạy cảm, không thích hợp sử dụng những liệu pháp điều trị mụn thông thường.
            Khách hàng gặp phải tình trạng mụn ẩn, khó loại bỏ hết nhân mụn từ sâu bên trong lỗ chân lông.
            Những khách hàng có nhu cầu ngăn ngừa mụn từ sớm để phòng tránh những tổn hại do mụn gây ra.
            Những đối tượng khách hàng cần điều trị mụn dứt điểm, thực hiện trong thời gian nhanh chóng nhưng sợ đau.
            Quy trình thực hiện DR. Seoul Trị và ức chế Mụn VAS 4.0
            Bước 1: Tẩy trang để loại bỏ đi những lớp trang điểm nhằm giúp da trở về trạng thái tự nhiên.

            Bước 2: Tẩy tế bào chết trên da nhằm làm sạch đi những tàn dư còn sót lại trước khi thực hiện điều trị.

            Bước 3: Rửa mặt bằng nước muối sinh lý.

            Bước 4: Xông hơi da trong khoảng 10 phút để lỗ chân lông nở rộng, dễ dàng làm sạch nhân mụn. Lưu ý không hút dầu trên da.

            Sát khuẩn bề mặt da trước khi điều trị
            Sát khuẩn bề mặt da trước khi điều trị
            Bước 5: Tiến hành sát khuẩn bề mặt làn da để tránh nguy cơ nhiễm trùng da.

            Bước 6: Lấy nhân mụn, tùy vào tình trạng da, loại mụn mà sẽ có phương pháp lấy nhân mụn khác nhau.

            Bước 7: Sát khuẩn lại thêm một lần nữa kèm theo điện cam để giảm sưng kháng viêm cho da sau khi lấy nhân mụn

            Bước 8: Đắp mặt nạ muối và Povidine trong thời gian từ 10 đến 15p giúp kháng khuẩn theo tỷ lệ 3:1 kết hợp xông lạnh để xoa dịu làn da, tránh kích ứng.

            Bước 9: Ủ tê da mặt từ 15 – 20 phút. Trong trường hợp khách hàng yêu cầu thì có thể lau thêm 1 lần Povidine trên da mặt tại những vùng ủ tê rồi mới tiến hành trị liệu mụn nếu như khách lo lắng về cảm giác đau.

            Bước 10: Tiến hành vô trùng đầu kim bằng dung dịch sát khuẩn trước khi tiến hành phi kim để loại bỏ hoàn toàn nguy cơ dị ứng với thuốc điều trị.

            Bước 11: Tiêm rải đều toàn bộ khuôn mặt và tập trung vào những vùng da bị mụn, mụn viêm để tăng cường hiệu quả trị liệu.

            Bước 12: Đi phi kim với vacxin mụn. Lưu ý mức độ đi kim sẽ tùy thuộc vào loại da của khách hàng cũng như tình trạng mụn cần trị liệu. Thường từ 0.5 -> 0,75 ở vùng trán, và từ 1 -> 2,5 tại vùng má. Sau khi phi kim ngay lập tức làm sạch bằng nước muối và thoa tinh chất để tránh nguy cơ thâm da do phi kim.

            Bước 13: Sau khi phi kim cần kết hợp đi búa lạnh và tiêm vacxin thêm 1 lần nữa để tăng cường hiệu quả thẩm thấu dưỡng chất vào da. Kết hợp với đắp mặt nạ và chiếu ánh sáng sinh học theo gói dịch vụ điều trị.

            Bước 14: Massage thư giãn đầu, cổ, vai gáy cho khách hàng sau thời gian dài thực hiện liệu trình

            Hướng dẫn chăm sóc da sau khi thực hiện liệu trình
            Sau khi thực hiện liệu trình DR. Seoul Trị và ức chế Mụn VAS 4.0, khách hàng nên chú ý thực hiện những điều sau đây để đảm bảo hiệu quả trị mụn cũng như giảm thiểu tối đa nguy cơ tổn thương da:

            Không rửa mặt bằng nước, sữa rửa mặt hay các sản phẩm sát khuẩn ngay sau khi thực hiện liệu trình bởi lúc này làn da vẫn còn bị tổn thương và để lại những vết thương hở. Thay vào đó, hãy lắng nghe và tuân thủ chỉ định của chuyên viên kỹ thuật trong quá trình chăm sóc da tại nhà.
            Hãy để những vết thương kéo da non tự nhiên, không dùng tay tác động lên những vị trí nặn mụn để tránh gây ra tổn thương và tạo ra sẹo tại những vùng da này.
            Tốt nhất là không sử dụng các loại mỹ phẩm trong thời gian phục hồi theo chỉ định, chỉ nên dùng một số sản phẩm dưỡng ẩm phù hợp và dịu nhẹ để xoa dịu làn da sau khi lấy nhân mụn.
            Phi kim da và đi tinh chất sẽ khiến da trở nên nhạy cảm và yếu hơn nhiều so với lúc bình thường. Vì vậy bạn nên chú trọng bảo vệ và che chắn da khỏi những yếu tố có hại như khói bụi, ánh nắng mặt trời một cách kỹ càng.', 'trangthai' => '1'],

            ['id'=>2,'iddm' => '7', 'img' => 'LHA_tri_mun.jpg', 'name' => 'Bạn đã biết gì về LHA- ngôi sao trị mụn thế hệ mới', 'slug' => Str::slug('Bạn đã biết gì về LHA- ngôi sao trị mụn thế hệ mới', '-'),'motangan'=>'Để mà nói về hoạt chất trị mụn thì chẳng ai là không biết AHA, BHA,…vân vân mây mây. Thế nhưng có một hoạt chất nghe vừa lạ vừa quen,', 'noidung' => 'Để mà nói về hoạt chất trị mụn thì chẳng ai là không biết AHA, BHA,…vân vân mây mây. Thế nhưng có một hoạt chất nghe vừa lạ vừa quen, đó là LHA liệu bạn đã biết chưa? Nếu chưa thì hôm nay chúng mình sẽ cùng tìm hiểu sâu về em nó nha, các bạn đang tìm hoạt chất trị mụn “chân ái” càng không thể bỏ qua đâu.

            Giữa LHA và BHA có gì khác biệt?
            Chúng ta đều biết BHA- Beta Hydroxy Acid thường được biết đến dưới dạng Salicylic Acid, có thể tan trong dầu. Do đó tác động sâu đến lỗ chân lông, có khả năng “thanh lọc” da, đẩy những bụi bẩn trong lỗ chân lông lên bề mặt da để làm sạch. LHA cũng vậy, ẻm thuộc cùng họ hàng với BHA đấy chứ nhưng vẫn có một số khác biệt dưới đây nè!



            Tại sao nên dùng LHA?
            LHA – Capryloyl Salicylic Acid là một phái sinh dạng nhẹ hơn của BHA. Nhờ kích thước phân tử to, không thấm quá sâu xuống da nên ít gây kích ứng hơn so với BHA, đồng thời hòa tan bã nhờn, tẩy tế bào chết giảm bít tắc lỗ chân lông. Em nó cũng có tính kháng khuẩn, giảm sưng viêm hiệu quả như BHA, hơn nữa còn ức chế quá trình hình thành melanin gây đốm thâm đó.



            Những sản phẩm trị mụn chứa LHA
            La Roche-Posay Effaclar Duo [+] – kem trị mụn và chăm sóc da mụn hàng đầu tại Pháp. Duo [+] giúp trị mụn, giảm sưng đỏ với các nốt mụn, giảm vết thâm do mụn và bảo vệ da trước sự tấn công của vi khuẩn. Với hoạt chất LHA và Salicylic Acid, Duo [+] làm sạch sâu trong từng lỗ chân lông, ngăn chặn sự tích tụ của tế bào chết, lỗ chân lông thông thoáng giảm thiểu được tình trạng mụn đang có và ngăn mụn phát hình thành trở lại.
            Kem Trị Mụn La Roche-Posay Effaclar A.I 15ml được chỉ định cho việc điều trị mụn tại chỗ theo điểm với khả năng làm giảm tình trạng sưng viêm của mụn nhanh chóng. Hơn 60% người sử dụng đều nhận thấy nốt mụn cải thiện rõ rệt chỉ sau 48h.
            Như vậy Effaclar A.I phù hợp nhất cho những bạn bị nốt mụn sưng viêm lớn mọc rải rác không quá nhiều, hoặc những người thi thoảng lên mụn muốn tìm biện pháp chấm mụn nhanh chóng nhất có thể.

            Kem trị mụn La Roche-Posay Effaclar K+
            La Roche – Posay nghiên cứu và chỉ ra rằng, dưới tác động của yếu tố bên ngoài (tia tử ngoại, chất ô nhiễm, bụi bẩn…) theo thời gian da trải qua quá trình oxy hóa dẫn tới tình trạng lão hóa.

            Lần đầu tiên, La Roche -Posay kết hợp 3 thành phần LHA, Vitamin E, Carnosine.. giúp ngăn ngừa tình trạng oxi hóa, da mịn màng đồng thời giúp da được sạch sâu hơn, lỗ chân lông thu nhỏ, da sạch mụn, giảm tiết dầu là những điều kem dưỡng La Roche-Posay Effaclar K(+) mang lại cho làn da của bạn.

            Tips sử dụng
            Bắt đầu với tần suất và nồng độ thấp để da làm quen
            Dùng kem dưỡng ẩm kèm theo để tránh bị khô
            Không quên kem chống nắng vào ban ngày, chống nắng đủ lượng và có thoa lại trong ngày nhé
            Nếu gặp hiện tượng khô, bong tróc, mẩn đỏ, ngứa nên dừng lại để da nghỉ ngơi.
            ', 'trangthai' => '1'],

            ['id'=>3,'iddm' => '6', 'img' => '1tang1.jpg', 'name' => 'MUA 1 TẶNG 1 BEST-SELLER', 'slug' => Str::slug('Ở ĐÂY BẠN MUA 1 ĐƯỢC THÊM TẶNG 1 BEST-SELLER, DANH SÁCH LÊN TỚI 50 SẢN PHẨM BEST-SELLER Các bạn tưởng Mint đã tổ chức sinh nhật xong rồi á?', '-'),'motangan'=>'Ở ĐÂY BẠN MUA 1 ĐƯỢC THÊM TẶNG 1 BEST-SELLER, DANH SÁCH LÊN TỚI 50 SẢN PHẨM BEST-SELLER','noidung'=>'Ở ĐÂY BẠN MUA 1 ĐƯỢC THÊM TẶNG 1 BEST-SELLER, DANH SÁCH LÊN TỚI 50 SẢN PHẨM BEST-SELLER
            Các bạn tưởng Mint đã tổ chức sinh nhật xong rồi á? Không phải đâu nha, lại có thêm 1 deal cực kì hấp dẫn với các bạn của Mint đây. Sinh nhật chúng mình mà người được nhận quà lại là các bạn đó.
            Mua sản phẩm nào được tặng thêm sản phẩm đó, từ drugstore cho tới highend không thiếu mức giá nào đâu nha.
            Chương trình diễn ra:

            Thời gian: 20/07 – 26/07
            Không áp dụng với thẻ tích điểm tại Mint, không áp dụng cùng các chương trình khuyến mại khác
            Áp dụng khi mua hàng tại các kênh mua hàng: trực tiếp, Fanpage Facebook, Instagram, Website (Không áp dụng tại: Shopee, Lazada, Tiki,..)
            ĐẶC BIỆT có chính sách SHIP siêu hời khi MUA 1 TẶNG 1:

            Đồng giá ship 10k với NỘI THÀNH (FREESHIP khi mua thêm 1 sản phẩm bất kì)
            Đồng giá ship 20k với NGOẠI THÀNH và các tỉnh khác (FREESHIP khi mua thêm 1 sản phẩm bất kì)
            DEAL MUA 1 TẶNG 1 số lượng có hạn nên các bạn mau tham khảo và nhanh đặt hàng nhé, check list của chúng mình ngay!!!

            Mascara Kush Milk 3ml: 120,000 <mua 1 tặng 1 BEST-SELLER >
            Mascara chứa các dưỡng chất tự nhiên giúp hàng mi của bạn dài gấp 95%.
            Mascara Kush: tạo cho bạn dáng lông mi vô cùng ưng ý và tự nhiên giúp bạn trông quyến rũ hơn khi sử dụng.
            Khi bạn chuốt loại mascara này sẽ có hai điều kì diệu xảy ra. Một ra từng sợi tơ nhỏ sẽ kéo dài hàng mi của bạn ra. Và hai là tinh chất cây gai dầu nuôi dưỡng và tạo điều kiện cho hàng mi của bạn khỏe mạnh và ít bị gãy hơn.
            Đầu chuốt với các lông chải mi được thiết kế hình trái tim, giúp lông mi trông dài và cong hơn, không bị vón cục và đặc biệt trông dày hơn cho lông mi bền đẹp suốt ngày, không lem trôi kể cả khi tiếp xúc với nước.
            Thành phần có chứa tinh dầu và dưỡng chất nuôi mi khỏe mạnh và tự nhiên hơn sau mỗi lần chải.

            Kem Chống Nắng L’Oreal UV Perfect Matte Fresh SPF50 15ml: 80,000 <Mua 1 tặng 1 BEST-SELLER >

            Kem chống nắng với công nghệ Activa-Cell, L’Oreal UV Perfect giúp bảo vệ các tế bào da, elastin và các sợi collagen khỏi tác hại của các gốc tự do. Đặc biệt, em này sở hữu công thức dành riêng cho làn da châu Á, đặc biệt là làn da dầu mụn, với dạng sữa màu xanh lá giúp cân bằng lại sắc tố trên da.

            Dầu Gội L’Oreal Elseve Extraordinary Oil 130ml: 69,000 <mua 1 tặng 1>
            Dòng dầu gội chăm sóc tóc chiết xuất từ 6 lolại hoa thiên nhiên nuôi dưỡng mái tóc mềm mại, suôn mượt. Thành phần dưỡng ẩm tốt cho tóc khô, xoăn và hư tổn. Nuôi dưỡng tóc chắc khỏe, bồng bềnh, giảm thiểu tình trạng rụng tóc.
            Sản phẩm có hương thơm dịu nhẹ của các loài hoa thiên nhiên sẽ tạo cho bạn cảm giác thư giãn. Thành phần an toàn, không gây kích ứng da đầu. Sản phẩm chuyên sâu cho mọi loại tóc, đặc biệt hiệu quả với mái tóc khô, xơ rối và hư tổn.

            Tẩy Trang Calliderm Lô Hội 500ml 250,000 <mua 1 tặng 1>
            Tẩy trang Calliderm Eau Micellaire – Organic Aloe Vera Juice là dòng nước tẩy trang dành cho da dầu, hỗn hợp. Chiết xuất từ nha đam có tác dụng làm sạch sâu bề mặt da, cùng thành phần giàu chất dinh dưỡng sẽ chăm sóc làn da hoàn hảo sau mỗi lần tẩy trang. Phiên bản này có mùi hương dịu nhẹ, dễ chịu.

            Dầu Tẩy Trang Kose White Cleansing Oil 230ml: 230,000 <mua 1 tặng 1>
            Kose White Cleansing Oil – Tẩy trang dạng dầu của thương hiệu mỹ phẩm nội địa Nhật Bản. Dầu Tẩy Trang Kosé Softymo White Cleansing Oil chiết xuất từ dầu cám gạo, một loại dầu có tỷ lệ khá cân bằng giữa Oleic và Linoleic Acid, do đó chất dầu lỏng, khá nhẹ. Dầu cám gạo được chứng minh có hiệu quả trong việc giữ ẩm, chống lão hóa và làm sáng da.

            Xà phòng For Butt Pelican (trái đào): 190,000 <mua 1 tặng 1>
            Xà phòng trái đào trị thâm mông Pelican sẽ làm sáng mịn, mềm mại và trị thâm mụn cho vùng hông và mông, giúp giải quyết các vấn đề về da như: Mông bị chai, sần sùi, thâm, nổi ban…
            Xà phòng trái đào trị thâm mông Pelican này với các thành phần có tác dụng tẩy da chết kết hợp hạt scrub (chiết xuất hạt đào, củ Konjac) và mật ong, hoa hồng lên men, nhóm AHA từ axit trái cây giúp loại bỏ lớp tế bào sừng già, tế bào chết, thô ráp, sần sùi trên bề mặt, hỗ trợ trị mụn cho vùng mông
            Ngoài ra em nó còn giữ độ ẩm cần thiết cho vùng mông nhờ có Chiết xuất hạt đào, lá đào, lá mận Nhật, quả kiwi, lá Atiso, gel lô hội giúp da trở nên mềm mịn. Dùng được cho cả cơ thể.

            Tẩy Trang Calliderm Rose 500ml: 250,000 <mua 1 tặng 1>
            Tẩy trang Calliderm Eau Micellaire – Organic Rose Extracts là dòng nước tẩy trang dành cho da khô.
            Tẩy trang chiết xuất từ hoa hồng chứa hàm lượng Vitamin B, C, D và E có tác dụng chống oxy hóa cho da, ngăn ngừa viêm lỗ chân lông, giảm mụn và làm sạch bụi bẩn trên da nhẹ nhàng.
            Tẩy trang Calliderm với công nghệ tiên tiến – Phân tử Micellar kép giúp làm sạch hoàn toàn lớp trang điểm, bụi bẩn, bã nhờn sâu trong lỗ chân lông mà không gây khô hại da, phù hợp với da thường tới khô.

            Serum The Ordinary Arbutin 2% + HA: 320,000 <mua 1 tặng 1>
            Serum The Ordinary Arbutin 2% + HA chứa Alpha-Arbutin hoạt động bằng cách ức chế quá trình oxy hóa một loại enzym chịu trách nhiệm sản xuất melanin gây sạm da, từ đó giúp da trắng sáng, giảm thâm mụn. Serum được sản xuất với nồng độ tối ưu 2%, kết hợp với 1% HA giúp chất serum ngấm sâu hơn, đem lại hiệu quả dưỡng sáng da tối ưu.

            Sữa Rửa Mặt Hada Labo Gokujyun Hatomugi Foaming Face Wash Tao Bọt: 250,000 <mua 1 tặng 1>
            • Dành cho: Da hỗn hợp dầu đến da dầu, da dầu mụn
            Sữa rửa mặt này vừa có hiệu quả cấp ẩm, vừa cải thiện độ sáng da. Thêm vào đó Hada Labo Gokujyun Hatomugi Foaming còn chứa chiết xuất hoa cúc, Dipotassium Glycyrrhizate và Amino Acid giúp làm giảm tình trạng sưng tấy của da mụn, làm sáng làn da bị sạm do dầu thừa.

            Serum Balance Hyaluronic Deep Moisture: 210,000 <mua 1 tặng 1>
            Serum Balance Hyaluronic Deep Moisture ĐƯỢC KIỂM NGHIỆM DA LIỄU nên cực kì phù hợp cho làn da NHẠY CẢM
            Trong 1 chai Serum Balance Hyaluronic Deep Moisture có chứa:
            5% HYLASOME EG10 – một chất vượt trội hơn hẳn Hyaluronic Acid với khả năng như sau
            – Giữ nước gấp 5 lần
            – Dưỡng ẩm gấp 5 lần trong vòng 24 tiếng
            – Chống ô xy hóa gấp 4 lần.

            Kẻ Mắt Isehan Heroine eyeliner Waterproof – màu đen: 250,000 <mua 1 tặng 1>
            Kẻ Mắt Kiss Me Heroine Make Smooth Liquid Eyeliner – luôn nằm trong top đầu các sản phẩm kẻ mắt được ưa thích nhất do người tiêu dùng bình chọn tại Nhật Bản. Kiss Me Heroine Make Smooth Liquid Eyeliner với thiết kế đầu siêu mảnh chỉ 0,1mm rất dễ dàng để các cô gái “biến hóa” cho đôi mắt thành những đường nét thanh mảnh, tự nhiên hay sắc nét, gợi cảm. Công thức chống nước cực tốt kể cả đi mưa hay đi biển.

            Serum Taiyou Aloe Hyaluronic Acid 10ml: 190,000 <mua 1 tặng 1>
            Đây là serum cấp nước “thuần chủng” 100% Hyaluronic Acid đó. Một giọt mang vác gấp 1000 lần lượng nước đưa vào da, giúp da căng mọng, đàn hồi, đặc biệt giảm cả nếp nhăn nông do bề mặt da ngậm nước căng tràn sức sống.
            Serum Taiyou Aloe Hyaluronic Acid sử dụng 1g muối Hyaluronic Acid Na, vốn là chất có phân tử nhỏ hơn HA bình thường rất nhiều do đó cho khả năng thẩm thấu vào da sâu hơn, cấp nước hiệu quả hơn.

            Son Dưỡng Môi Nuxe Reve de Miel Lip Moisturizing Stick: 160,000 <mua 1 tặng 1>
            Son dưỡng được ca ngợi như một loại son dưỡng môi “thần thánh”, Nuxe Reve de Miel – Lip Moisturizing Stick dường như là một vị “cứu tinh” cho những đôi môi quanh năm suốt tháng đều khô ráp và nứt nẻ.
            Nuxe Reve de Miel – Lip Moisturizing Stick cung cấp độ ẩm cho môi với sáp ong cùng dầu dưỡng thiên nhiên, môi như được ủ “nước”, cấp thêm dưỡng chất, dưỡng ẩm sâu như thể các tế bào của môi đều được làm mới, được tăng thêm độ ẩm, nên ngay cả những đôi môi “nhăn nheo” cũng sẽ được mềm, mịn trở lại.

            Son Dưỡng môi dạng thỏi Caudalie Lip Conditioner: 150,000 <mua 1 tặng 1>
            Dựa theo tiêu chí của Caudalie với thành phần 99.5% là nguyên liệu thiên nhiên, không hề chứa parabens và được loại bỏ hoàn toàn các chất bảo quản có hại khác. Không chỉ đơn thuần là một loại son dưỡng môi cung cấp độ ẩm, phục hồi đôi môi nứt nẻ mà Caudalie Lip Conditioner còn được bổ sung hợp chất chống oxy hóa từ những trái nho, giữ cho đôi môi bạn luôn mềm mại, hạn ché tình trạng bong tróc, môi hồng hào, luôn “trẻ”

            Dầu Xả Le Petit Amande Douce Creme de Riz 200ml: 170,000 <mua 1 tặng 1>
            Dầu xả chiết xuất Sữa Hạnh Nhân và Sữa Gạo Le Petit Olivier chứa thành phần dưỡng chất từ thiên nhiên dành cho mái tóc nhanh và dễ bết dính, khô xơ thiếu sức sống.

            Son Fenty Beauty by Rihanna Lipstick – Freckle Fiesta: 590,000 <mua 1 tặng 1>
            Chất Son Fenty Beauty Mattemoiselle Plush Matte cực đỉnh cùng độ bền màu rất tốt. Thuộc dòng Mattemoiselle Plush Matte lên màu mịn mướt và chuẩn màu chỉ sau một lần quệt. Khoảng 20 phút sau son sẽ lì hơn và không bị xê dịch nhiều khi bặm, siêu nhẹ môi.
            Freckle Fiesta – Cam gạch đẹp nức lòng người.

            Son Thỏi YSL Rouge Volupte Shine Oil In Stick 46 Orange Perfecto: 720,000 <mua 1 tặng 1>
            Son Thỏi YSL Rouge Volupte có chất son được thiết kế ánh nhũ lấp lánh đậm chất trendy của năm 2020, thực sự là rất đáng để sở hữu đó. Giúp đôi môi mọng ửng hồng như gái Hàn, cộng thêm hiệu ứng ánh nhũ siêu tinh tế làm môi thêm phần căng mọng.
            46 Orange Perfecto: cam hồng san hô trẻ trung tươi tắn, không cần trang điểm

            Son Thỏi YSL Rouge Pur Couture 114 Dial Red: 790,000 <mua 1 tặng 1>
            YSL Rouge Pur Couture với chất son mềm mại, chứa nhiều dưỡng chất, màu sắc đậm rõ nét. Son mềm mượt, lên môi cho cảm giác căng mọng, đầy đặn hơn chứ không bóng nhẫy và dính dính khó chịu.
            Tông 114 Dial Red: đỏ thuần.

            Son Thỏi Dior Addict Stellar Shine 464 Energy: 720,000 <mua 1 tặng 1>
            Son Thỏi Dior Addict Stellar Shine là dòng son màu có dưỡng chứa sáp ong tự nhiên, cùng chiết xuất lô hội và các loại dầu đặc biệt sẽ giữ cho đôi môi bạn mềm mại và căng mọng.
            Mint mang đến 3 màu sắc bắt mắt nhất bộ sưu tập phù hợp với những cô gái theo đuổi phong cách nhẹ nhàng, nữ tính và tự nhiên trong kiểu trang điểm hằng ngày trong veo.
            464 Energy: hồng cam san hô, phù hợp với các makeup nhẹ nhàng, nữ tính.

            Son Kem YSL Vinyl Cream 401: 890,000 <mua 1 tặng 1>
            Son Kem YSL Vinyl Cream có chất son bóng mịn. Không bị dính dấp mà lại trơn mượt trên môi. Màu lên rõ từ lần nhúng cọ đầu tiên, căng mọng như một trái Cherry ngọt ngào. Son bóng mướt nhưng lên màu chuẩn và giữ màu lâu, kể cả khi trôi đi đôi môi vẫn hồng hào xinh xắn
            Tông 401 là tông đỏ tươi hợp với mọi tông da và nhiều dịp khác nhau.

            Son Kem YSL Vinyl Cream 409: 890,000 <mua 1 tặng 1>
            Son Kem YSL Vinyl Cream có chất son bóng mịn. Không bị dính dấp mà lại trơn mượt trên môi. Màu lên rõ từ lần nhúng cọ đầu tiên, căng mọng như một trái Cherry ngọt ngào. Son bóng mướt nhưng lên màu chuẩn và giữ màu lâu, kể cả khi trôi đi đôi môi vẫn hồng hào xinh xắn
            Tông 409 là tông Đỏ rượu vang hợp với mọi tông da và nhiều dịp khác nhau.

             Son Fenty Beauty Glow Bomb Fussy 5,5ml: 320,000 <mua 1 tặng 1>
            Son Fenty Beauty Gloss Bomb Fussy đem lại đôi môi quyến rũ với tông màu hồng ngọt ngào “My Lip But Better” với texture mướt mịn, không gây cảm giác nặng môi như các loại son bóng thông thường. Đánh lên là môi được phủ một lớp óng ánh long lanh hút mắt dã man.

             Sữa Tắm Andalou Citrus Sunflower Uplifting 251ml : 290,000 <mua 1 tặng 1>
            Sữa Tắm Andalou Citrus Sunflower Uplifting Shower Gel 251ml là sữa tắm giúp làm sáng da.
            Với công thức dưỡng ẩm cao giúp làm sạch da nhẹ nhàng nhưng vẫn giữ lại độ ẩm tự nhiên của làn da, Sữa Tắm Andalou Citrus Sunflower Uplifting Shower Gel 251ml mang đến làn da mềm mại và mịn màng hơn chỉ sau một lần tắm.

             Dưỡng Chất Kiehls Clearly Corrective Accelerated Clarity Renewing Ampoules: 210,000 <mua 1 tặng 1>
            Dưỡng Chất Kiehl’s Clearly Corrective Accelerated Clarity Renewing Ampoules là sự KẾT HỢP của vitamin C và AHAs trong một sản phẩm. Sản phẩm giúp tẩy da chết, kích thích thay mới tế bào, tăng khả năng giữ nước tự nhiên của da, giúp chúng mình nhanh chóng đạt được làn da căng mịn, rạng ngời, và đặc biệt là mờ thâm trong khoảng 14 ngày!!

            Tẩy Trang Calliderm Bleuet 500ml: 250,000 <mua 1 tặng 1>

            Tẩy trang Calliderm Eau Micellaire – Cornflower Water là dòng nước tẩy trang dành cho da cực kì nhạy cảm, dễ kích ứng. Tẩy trang chiết xuất từ Thanh Cúc giúp dưỡng da sáng mịn, cung cấp độ ẩm cần thiết cho da, se khít lỗ chân lông, kháng viêm, ngừa mụn.Tẩy trang Calliderm với công nghệ tiên tiến – Phân tử Micellar kép giúp làm sạch hoàn toàn lớp trang điểm, bụi bẩn, bã nhờn sâu trong lỗ chân lông mà không gây khô hại da, phù hợp với da thường, da nhạy cảm.

            Kem Chống Nắng Paula’s Choice Skin Restoring Moisturizer SPF50 60ml: 930,000 <mua 1 tặng 1>
            Kem dưỡng ẩm chống lão hóa cung cấp lượng ẩm dồi dào và khả năng bảo vệ da mạnh mẽ với các thành phần “siêu sao” như niacinamide, bơ hạt mỡ và cam thảo cho làn da trẻ trung và mịn màng không tì vết.
            – Giúp ngăn ngừa lão hóa sớm.
            – Các chất chống oxy hóa giúp da chống lại những căng thẳng từ môi trường.
            – Resist Skin Restoring Moisturizer with SPF 50 giúp bảo vệ da khỏi tác hại của tia UVA, UVB. Các chất chống oxy hóa mạnh mẽ như bơ hạt mỡ, hạt cà phê và táo kết hợp với niacinamide và chiết xuất cam thảo giúp cải thiện kết cấu và tông màu da, đem lại làn da rạng rỡ hơn sau mỗi lần sử dụng.

            Kem Dưỡng Paula’s Choice Water Infusing Electrolyte Moisturizer 50ml: 1,190,000 <mua 1 tặng 1>
            Kem Dưỡng Paula’s Choice Water Infusing Electrolyte Moisturizer là kem dưỡng “điện giải” giúp TĂNG KHẢ NĂNG GIỮ ẨM TỰ NHIÊN của da lên. Hỗn hợp các chất điện giải trong công thức của PLC gồm canxi, kali và magiê được liên kết với PCA giống như cấu tạo của da, cho phép chúng hoạt động ổn định. Giúp làn da duy trì sự cân bằng độ ẩm, tăng cường hàng rào bảo vệ da, khiến da tràn đầy sức sống hơn. Không hề nhờn dính, thoáng mát và thẩm thấu nhanh.

            Sữa Rửa Mặt MartiDerm Acniover Purifying Gel 200ml: 850,000 <mua 1 tặng 1>
            Sữa rửa mặt MartiDerm Acniover Purifying Gel 200ml là dòng sữa rửa mặt dạng gel thiết kế dành riêng cho da dầu mụn. Sữa rửa mặt nổi tiếng với không chứa hoạt chất hoạt động bề mặt Sodium Lauryl Sulfate (SLS) / Sodium Laureth Sulfate (SLES). Vì thế làn da nhạy cảm cũng có thể sử dụng mà không lo khô căng da.

            Kem Dưỡng MartiDerm Skin Repair Cicra-Vass Crema Cream 30ml: 780,000 <mua 1 tặng 1>

            Kem dưỡng phục hồi da, giúp tái tạo phần da bị tổn thương. Kem dưỡng nuôi dưỡng lớp màng ẩm tự nhiên bảo vệ da, cho da khỏe mạnh, mềm mại hơn, đồng thời tăng cường độ đàn hồi và săn chắc của da. Sản phẩm phù hợp với làn da nhạy cảm nhất cũng có thể sử dụng.

            Ống Tinh Chất Marti Derm Platinum Night Renew 2ml: 110,000 <mua 1 tặng 1>
            MartiDerm Platinum Night Renew Ampoule là ampoule nuôi dưỡng và tái tạo da chuyên biệt vào ban đêm từ thương hiệu Martiderm. Công thức kết hợp nồng độ 10% AHA, Marine Collagen và Hyaluronic Acid giúp loại bỏ tế bào chết và thúc đẩy tái tạo tế bào da mới, đồng thời dưỡng ẩm cho da căng mướt, tăng cường độ đàn hồi và săn chắc của làn da, cho làn da tươi trẻ và rạng rỡ. Sản phẩm lý tưởng để sử dụng như một loại tinh chất tăng cường, giúp tối ưu hoá kết quả của các sản phẩm treatment khác.

            Ống Tinh Chất Marti Derm The Originals Proteos Liposome 2ml: 110,000 <mua 1 tặng 1>
            MartiDerm The Originals Proteos Liposome là tinh chất cô đặc với công thức không chứa dầu (oil-free) có chức năng cấp ẩm tức thì, lý tưởng dành cho làn da dầu nhạy cảm, dễ nổi mụn hoặc da phản ứng. Công thức sản phẩm độc đáo với 3% Proteoglycans kết hợp cùng Vitamins C & E liposomes và chiết xuất cây Phỉ, giúp cung cấp độ ẩm mạnh mẽ và chuyên sâu cho da, cân bằng lượng dầu tiết ra. Đồng thời, sản phẩm giúp chống oxy hoá và hỗ trợ sửa chữa các tổn thương da do tác hại của ánh nắng mặt trời, làm sáng và đồng đều màu da.

            Tinh Chất Marti Derm Black Diamond Skin Complex Advanced 2ml: 130,000 <mua 1 tặng 1>
            MartiDerm Black Diamond Skin Complex Advanced là phiên bản cải tiến mới của Skin Complex+, với công thức toàn diện nhất giúp đặc trị làn da lão hóa do yếu tố nội sinh. Sản phẩm là sự kết hợp của 5% Proteum 89+ (thành phần độc quyền Martiderm) giúp cung cấp độ ẩm chuyên sâu và cải thiện cấu trúc da; 25% Vitamin Complex (trong đó bao gồm 15% Vitamin C-Tech & 10% Vitamin A, B5, E, F & D-Like) giúp chống oxy hóa mạnh mẽ, làm chậm tiến trình lão hóa da, đồng thời nuôi dưỡng và phục hồi lại độ ẩm mượt, sáng mịn và tươi trẻ của làn da. Sản phẩm đặc biệt lý tưởng dành cho làn da khô mất nước, xỉn màu, có dấu hiệu chảy xệ và nếp nhăn.

            Son Silky Girl OMG Powder Matte 16 Chili: 149,000 <mua 1 tặng 1>
            Son Thỏi Silkygirl OMG Powder Matte thiết kế son nhã nhặn, thanh lịch, vỏ son đen bóng kèm nắp bấm. Chất son mềm nhẹ như bơ, mỏng mướt dễ chịu như đánh son dưỡng nhưng màu lên vẫn chuẩn. Son giấu nhẹm mọi khuyết điểm và để lại lớp finish yêu chiều đôi môi.
            14 Daisy – Đỏ Coral

            Son Silky Girl OMG Powder Matte 16 Chili: 149,000 <mua 1 tặng 1>
            Son Thỏi Silkygirl OMG Powder Matte thiết kế son nhã nhặn, thanh lịch, vỏ son đen bóng kèm nắp bấm. Chất son mềm nhẹ như bơ, mỏng mướt dễ chịu như đánh son dưỡng nhưng màu lên vẫn chuẩn. Son giấu nhẹm mọi khuyết điểm và để lại lớp finish yêu chiều đôi môi.
            16 Chili – Đỏ Hồng

            Son Silky Girl OMG Powder Matte 16 Chili: 149,000 <mua 1 tặng 1>
            Son Thỏi Silkygirl OMG Powder Matte thiết kế son nhã nhặn, thanh lịch, vỏ son đen bóng kèm nắp bấm. Chất son mềm nhẹ như bơ, mỏng mướt dễ chịu như đánh son dưỡng nhưng màu lên vẫn chuẩn. Son giấu nhẹm mọi khuyết điểm và để lại lớp finish yêu chiều đôi môi.
            15 Candy – Đỏ Cam

            Dầu Gội Le Petit Olivier Apporte Douceur Brillance 250ml: 160,000 <mua 1 tặng 1>
            Dầu gội chiết xuất Sữa Hạnh Nhân và Sữa Gạo Le Petit Olivier chứa thành phần dưỡng chất từ thiên nhiên dành cho mái tóc trở nên bết dính, khô xơ thiếu sức sống. Nhờ chiết xuất từ tự nhiên, dầu gội sẽ lấy đi bụi bẩn, dầu thừa một cách nhẹ nhàng và làm sạch hiệu quả.

             Kem Dưỡng Murad Clarifying Water Gel 47ml: 1,737,000 <mua 1 tặng 1>
            Kem Dưỡng Murad Clarifying Water Gel Oil Free là lựa chọn lý tưởng cho da dầu mụn. Chứa công nghệ độc quyền của hãng với khả năng cân bằng lượng dầu thừa trên da, giúp da đủ độ ẩm căng bóng mà không gây đổ dầu nhiều. Chất gel mát lạnh, thấm nhanh rất hợp cho mùa hè, chỉ 10s là thấm hết thôi. Công thức hoàn toàn không chứa dầu nên vô cùng lành tính.

            Kem Dưỡng Paula’s Choice Probiotic Nutrient Moisturizer 50ml: 1,390,000 <mua 1 tặng 1>
            Kem Dưỡng Paula’s Choice Probiotic Nutrient Moisturizer là kem dưỡng có khả năng tác động trực tiếp đến cấu trúc hệ vi sinh vật trên da. Trực tiếp bổ sung các chất dưỡng ẩm và chống oxi hóa như Ceramides, Vitamin E và các loại Acid béo giúp kem dưỡng kiêm nhiệm chức năng dưỡng ẩm, làm mềm da và chống lão hóa. Chất gel lỏng thấm nhanh và phù hợp với nhiều loại da. Có thể sử dụng cả sáng và tối.

            Serum Murad Rapid Age Spot Correcting 30ml: 3,078,000 <mua 1 tặng 1>
            Serum Trị Nám Murad PHIÊN BẢN MỚI. Thành phần cải tiến không còn chứa Hydroquinone.
            Hiệu quả hơn, an toàn hơn, tác dụng nhanh trông thấy ít nhất trong 1 TUẦN.
            Serum Murad Rapid Age Spot Correcting 30ml sử dụng:
            – Công nghệ độc quyền NHP-3: pha trộn 3 thành phần mạnh mẽ Niacinamide, Hexylresorcinol và Plankton Extract, đã được chứng minh là có thể cải thiện màu da từ làm đều màu, sáng trắng, trị thâm trị nám đến giải quyết các dấu hiệu lão hóa rõ rệt.
            – Đặc biệt chứa Vitamin C dạng bền vững Ascorbyl Glucoside, khi kết hợp với Niacinamide sẽ làm tăng hiệu quả làm sáng gấp đôi mà khó bị oxy hóa, giảm tác dụng.
            – Chưa hết, serum Murad trị nám phiên bản mới còn loại bỏ cồn và AHA, giúp giảm nguy cơ kích ứng cho da nhạy cảm.

             Treatment Murad Outsmart Acne 50ml: 1,980,000 <mua 1 tặng 1>
            Treatment Murad Outsmart Acne Clarifying có khả năng trị các loại mụn như MỤN ẨN, MỤN VIÊM, MỤN ĐẦU TRẮNG, ĐẦU ĐEN chỉ trong vòng 1 tuần
            Công nghệ độc quyền Penta – Acid – 5 loại acid TRỊ MỤN. Đó là BHA trị mụn ẩn. AHA giảm mụn đầu đen đầu trắng. Và 3 loại acid khác giúp kiềm dầu và giảm mụn viêm sưng
            Outsmart Acne nên dùng ở bước sau toner như 1 serum trị mụn, có thể bôi theo vùng mụn để có hiệu quả nhất, với những trường hợp mụn nặng nên kết hợp với chấm mụn Murad Rapid Relief để giảm viêm và rụng cồi mụn sưng nhanh hơn

            Serum Murad Vita C Glycolic Brightening 30ml: 3,298,000 <mua 1 tặng 1>
            Serum Murad Vita C Glycolic Brightening là sự kết hợp của 3 dạng Vitamin C và AHA, bền vững hơn, ổn định hơn, hấp thụ tốt hơn. Giúp chống lại tình trạng lão hóa, da sạm màu, kém săn chắc bởi những tác động bởi môi trường đồng thời duy trì làn da tươi sáng, khỏe mạnh. Giúp bật sáng tông da, tăng cường miễn dịch da và tạo độ đàn hồi & săn chắc trên da.

             Tinh Chất Murad Hydro Dynamic Quenching 30ml: 3,078,000 <mua 1 tặng 1>
            Tinh Chất Murad Hydro Dynamic Quenching Essence là dòng tinh chất cung cấp độ ẩm, đẩy nhanh tốc độ phục hồi làn da lão hóa, giúp da sáng mịn và căng bóng hơn. Sản phẩm là chìa khóa vàng cho da thiếu ẩm, có dấu hiệu lão hóa được nhiều người sử dụng tin dùng.

            Kem Dưỡng Murad Night Fix Enzyme Treatment 30ml: 2,488,000 <mua 1 tặng 1>
            Kem Dưỡng Murad Night Fix Enzyme Treatment 30ml là giải pháp phục hồi làn da vào buổi đêm. Khi vào giấc ngủ, làn da luôn cần được dưỡng ẩm liên tục và tái tạo làn da. Nhờ chứa ChronoPeptide và các loại enzyme mà làn da sẽ được cung cấp độ ẩm dồi dào và hồi sinh sau giấc ngủ. Tạo ra vẻ ngoài tươi khỏe và tràn đầy sức sống tựa như có được giấc ngủ thật ngon

            Sữa Rửa Mặt Murad AHA/BHA Cleanser 15ml: 123,000 <mua 1 tặng 1>
            Sữa rửa mặt và tẩy tế bào chết trong cùng một sản phẩm – Sữa Rửa Mặt Murad AHA/BHA Exfoliating Cleanser 200ml.
            Sữa rửa mặt tẩy tế bào chết với 3 chất thành phần acid: Salicylic, Lactic và Glycolic Acid giúp nhẹ nhàng tái tạo và phục hồi các tế bào mang lại làn da sáng khỏe, hạn chế bít tắc lỗ chân lông gây mụn.
            Sự kết hợp của hạt Jojoba còn giúp nhẹ nhàng lấy đi các tế bào chết xỉn màu, thiếu sức sống đồng thời “đánh bóng” cho làn da thêm mượt mà và mềm mại, giảm mụn cám, mụn đầu đen. Hạt nhỏ xíu xiu không hề làm xước da đâu nha.
            Sữa rửa mặt không làm khô da ngược lại còn giúp da mềm mịn vô cùng.

            Sữa Rửa Mặt Murad Essential C 15ml: 118,000 <mua 1 tặng 1>
            Murad Essential-C Cleanser là sữa rửa mặt cực kỳ đình dám đến từ thương hiệu mỹ phẩm nổi tiếng Murad. Sản phẩm sử dụng Vitamin A, C và E giúp cân bằng và cấp ẩm ngay lập tức cho những làn da bị tổn hại bởi môi trường.
            Trong đó Vitamin A giúp nuôi dưỡng và làm lành da, Vitamin C giúp ngăn ngừa sự tổn thương của môi trường và Vitamin E làm dịu, cấp ẩm cho vùng da mất nước.
            Ngoài ra sản phẩm còn chứa thành phần Phospholipids giúp giữ nước, cân bằng độ ẩm cho da khiến bạn được trải nghiệm cảm giác sảng khoái tuyệt đối trong hương cam quýt thanh mát, da sạch bong mà vẫn mềm mại ẩm mượt như nhung.

            Serum Murad Retinol Youth Renewal 30ml: 3,435,000 <mua 1 tặng 1>
            Serum Murad Retinol Youth Renewal là một trong những công nghệ mang tính đột phá về chăm sóc da lão hóa. Sản phẩm giúp giảm thiểu các dấu hiệu lão hóa một cách mạnh mẽ & nhanh chóng nhưng lại vô cùng êm dịu trên làn da. Đồng thời, serum còn tạo ra nét da tươi sáng, mịn màng. Giải quyết được các vấn đề phổ biến như: Da không đều màu, kém săn chắc…

            Set Murad Take Time Off: 3,118,000 <mua 1 tặng 1>
            Bộ sản phẩm cho bạn trải nghiệm gần như đầy đủ các bước dưỡng da trong phác đồ điều trị lão hóa theo chuẩn của Bác sĩ Howard Murad. Set này là set mới nhất và cũng chính là set mà mình mong đợi nhất từ Murad bởi những feedbacks, reviews cực kì tích cực của những sản phẩm lẻ trong set, ngoài ra khi ghép set như vậy giá thành sản phẩm cũng rẻ đi đáng kể nửa…thực sự rất hấp dẫn phải không ạ? ^^
            —————————–
            1. Serum Retinol Youth Renewal:
            Là sản phẩm retinol số 1 tại Mỹ với công dụng làm mờ các các nếp nhăn hiện hữu, làm đều màu da và hồi phục độ săn chắc cho làn da.
            —————————–
            2. Replenishing Multi-Acid Peel:
            Peel kích hoạt tái tạo thanh xuân giúp tái cấu trúc bề mặt da, để da mịn màng, tươi sáng với bộ 3 AHA – BHA – Tranexamic Acid. Ngoài ra sp còn được bổ sung thêm các thảo dược, omega giúp làm dịu, giảm kích ứng, chống lão hóa nữa.
            —————————–
            3. Kem dưỡng Retinol Youth Renewal Night Cream:
            Kem dưỡng ban đêm này có tác dụng làm mờ những dấu hiệu lão hóa, cải thiện bề mặt da trở nên mềm mại, mịn màng, và khôi phục độ ẩm cần thiết cho da.
            —————————–
            4. Kem mắt Renewing Eye Cream:
            Kem mắt với công nghệ Retinol Tri-Active giúp làm tan bọng mắt và xóa nhòa những nếp nhăn quanh mắt.
            Bộ sản phẩm cho bạn trải nghiệm gần như đầy đủ các bước dưỡng da trong phác đồ điều trị lão hóa theo chuẩn của Bác sĩ Howard Murad. Set này là set mới nhất và cũng chính là set mà mình mong đợi nhất từ Murad bởi những feedbacks, reviews cực kì tích cực của những sản phẩm lẻ trong set, ngoài ra khi ghép set như vậy giá thành sản phẩm cũng rẻ đi đáng kể nửa…thực sự rất hấp dẫn phải không ạ? ^^', 'trangthai' => '1'],

            ['id'=>4,'iddm' => '6', 'img' => 'blog1.jpg', 'name' => 'Cách làm kem trộn trị mụn trắng da an toàn tại nhà đơn giản', 'slug' => Str::slug('Cách làm kem trộn trị mụn trắng da an toàn tại nhà đơn giản', '-'),'motangan'=>'Để sở hữu làn da mịn màng, trắng sáng và không có nốt mụn, da luôn căng mọng, nhiều chị em đã lựa chọn sử dụng kem trộn.',
            'noidung'=>'Để biết được cách làm kem trộn trị mụn trắng da, bạn cần biết được kem trộn trị mụn trắng da là gì và thành phần của nó.
            Để có thể sở hữu làn da trắng sáng mịn màng và khiến cho da sạch mụn, các chị em thường áp dụng các phương pháp, bí quyết làm đẹp khác nhau. Trong số các phương pháp trị mụn, làm trắng da thì việc sử dụng kem trộn là cách làm đẹp được nhiều chị em truyền tai nhau thực hiện nhiều nhất.

            Kem trộn trị mụn trắng da là dạng kem bôi lên trên da mặt và cả da toàn thân tại các vị trí da không đều màu và có mụn xuất hiện. Thường các loại kem này được rao bán nhiều trên các trang mạng xã hội. Thế nhưng vì có quá nhiều tin đồn không tốt về các sản phẩm kem trộn trên thị trường, nên để đảm bảo an toàn nhiều chị em đã lựa chọn tự làm tại nhà, với những nguyên liệu vô cùng đơn giản và dễ tìm.

            Theo như những nghiên cứu, thì các loại kem trộn thường được điều chế có cấu tạo gồm các thành phần chính như: BHA, AHA, Benzoyl Peroxide,.. Đây là những thành phần luôn có mặt trong các thành phần cấu tạo nên các loại kem trị mụn cũng như nuôi dưỡng làn da trắng mịn.

            Benzoyl Peroxide có thể nói là một trong những nguyên liệu, thành phần quen thuộc có trong nhiều sản phẩm làm đẹp. Theo như các nghiên cứu da liễu đã chứng minh, chất này có khả năng mang đến công dụng cực kỳ cao và hiệu quả trong việc loại bỏ cũng nhưng làm lành vết thương do mụn gây ra.

            Không chỉ có vậy, hàm lượng thành phần Benzoyl Peroxide còn có công dụng tác động đến cấu trúc của da, khi bạn bôi nó lên cơ thể hoặc lên da mặt. Việc tác động đến cấu trúc của da này, giúp cho quá trình oxy hóa diễn ra chậm hơn và phát vỡ cấu trúc cùng dưỡng chất gây nên mụn.

            Do đó, kem trộn trị mụn trắng da có thể giúp bạn loại bỏ các lớp tế bào chết trên da, hạn chế tình trạng vi khuẩn, bụi bẩn và bã nhờn tích tụ gây nên mụn. Chính vì vậy, hàm thành phần Benzoyl Peroxide không thể thiếu trong công thức làm kem trộn trị mụn trắng da được.
            Thành phần AHA, BHA
            Ngoài công dụng hiệu quả của Benzoyl Peroxide, thì BHA và AHA cũng mang đến công dụng tuyệt vời không kém. Chúng có công dụng khá đặc biệt, giúp loại bỏ các nốt mụn trên da và khiến da điều màu.

            AHA có khả năng loại bỏ các lớp sừng bám trên da một cách hiệu quả và nhanh chóng. Nhờ đó, da trở nên sạch sẽ hơn và các lỗ chân lông cũng được thông thoáng, giúp ngăn ngừa mụn phát triển cũng như xuất hiện.
            Ngoài ra, khi hàm lượng thành phần AHA kết hợp cùng với BHA chúng sẽ mang đến cho bạn, những công dụng hiệu quả, ấn tượng và mạnh mẽ. Có lợi cho làn da ở phần trung bì và thượng bì, giúp vùng da trắng sáng hơn.

            Cách làm kem trộn trị mụn trắng da ngay tại nhà
            Bên cạnh việc lựa chọn kem trộn trắng da trị mụn, bạn có thể tự thực hiện cách làm kem trộn trị mụn trắng da tại nhà, với các nguyên liệu y dược kết hợp cùng nguyên liệu thiên nhiên. Dưới đây là một số cách mà bạn có thể tham khảo.

            Aspirin làm nên kem trộn cùng mật ong và chanh
            Thành phần Aspirin tuy được ít chị em biết đến nhưng lại mang đến công dụng hiệu quả. Khi kết hợp Aspirin cùng với mật ong và nước cốt chanh sẽ tạo nên hỗn hợp kem trị mụn và giúp trắng da tuyệt vời.

            Mật ong có chứa hàm lượng các chất có tính kháng viêm, kháng khuẩn cao, mang đến tác dụng tẩy tế bào chết và giúp các bụi bẩn bên trong lỗ chân lông được làm sạch. Từ đó, kết hợp với tính axit có trong chanh tươi, giúp sát trùng cho da và hỗ trợ giảm viêm mụn.

            Trộn cùng với Aspirin, ta sẽ có được loại hỗn hợp cũng như cách làm kem trộn trị mụn trắng da hiệu quả và đơn giản ngay tại nhà. Tuy nhiên, cách trộn này không phải ai cũng có thể thực hiện được, nếu thực hiện không đúng cách sẽ dễ gây tổn thương cho da. Bạn nên áp dụng đúng công thức như sau:

            Nguyên liệu bạn cần

            ½ muỗng bột Aspirin.
            1 muỗng mật ong nguyên chất.
            ½ muỗng nước cốt chanh.

            Bạn cần trộn các nguyên liệu lại cùng với nhau, để có được hỗn hợp trị mụn và làm trắng da dạng sánh mịn.
            Nhớ dùng sữa rửa mặt hoặc bằng cách xông hơi, để giúp lỗ chân lông trên mặt sạch sẽ và thông thoáng.
            Bôi hỗn hợp lên trên da mặt, nhất là vùng da có mụn và không đều màu.
            Chờ đợi và thư giãn cùng mặt nạ trong vòng 20 phút, rồi bằng lấy nước sạch mát để vệ sinh và rửa sạch lại da.

            Kem trộn trắng da trị mụn cùng Benzoyl Peroxide
            Với công dụng của Benzoyl Peroxyd được nhắc đến ở nội dung trên thì bạn có thể sử dụng nó trong công thức làm trắng da, giảm mụn này. Hãy kết hợp Benzoyl Peroxide cùng với đó là Sulfur, nguyên liệu có công dụng giảm viêm sưng và giúp da hạn chế mụn hình thành. Bạn có thể mua 2 nguyên liệu này tại các tiệm thuốc tây.

            Chuẩn bị nguyên liệu

            2 viên Benzoyl Peroxyd.
            2 viên Sulfur.
            Cách làm kem trộn trị mụn trắng da

            Bạn cần giã nhuyễn chúng ra thành bột rồi cho vào trong chén sạch, trộn đều chúng lại với nhau và cho ít nước vào để có hỗn hợp sền sệt.
            Thực hiện công việc làm sạch toàn bộ da mặt, bằng cách sử dụng sữa rửa mặt hoặc phương pháp xông hơi. Giúp lỗ chân lông trở nên sạch sẽ và thông thoáng, dễ dàng hấp thụ chất dinh dưỡng trên da.
            Tiếp đến, bạn thoa hỗn hợp thuốc lên trên da mặt đặt biệt là những vùng da cần làm trắng và cần đánh bay mụn.
            Thư giãn với mặt nạ trong thời gian từ 25 – 30 phút, bạn dùng nước sạch ấm và nước mát để rửa lại, rồi mới dùng khăn bồn thâm khô.
            Thực hiện áp dụng bôi kem trộn này, giúp các nốt mụn cám, mụn đầu đen có trên da khô lại và tự động bong tróc. Da cũng trở nên trắng mịn, sáng đều màu.
            ','trangthai' => '1'],

            ['id'=>5,'iddm' => '5', 'img' => 'matxa1.jpg', 'name' => 'CHUẨN BỊ GÌ KHI THỰC HIỆN BODY MASSAGE TẠI NHÀ', 'slug' => Str::slug('CHUẨN BỊ GÌ KHI THỰC HIỆN BODY MASSAGE TẠI NHÀ', '-'),'motangan'=>'Trong mùa giãn cách chúng ta không thể đến spa thì bạn hoàn toàn có thể tự thư giãn bản thân bằng cách thực hiện body massage tại nhà.',
            'noidung'=>'1. Chế độ ăn uống & trang phục khi thực hiện body massage
            Đầu tiên, uống thật nhiều nước, tránh các thức uống chứa cồn & cafein. Bởi rượu sẽ làm cơ thể bạn mất nước dẫn đến tình trạng căng thẳng. Uống nước trước & sau khi massage sẽ giúp giảm đau cho các cơ bắp vì khi đó cơ thể loại bỏ các chất thải, độc tố ra ngoài liên tục trong suốt quá trình body massage.

            Bên cạnh đó, hãy ăn nhẹ trước khi massage để chắc chắn rằng bạn không quá đói bụng nhưng hãy nhớ là đừng nên ăn quá nhiều. Một số món ăn mà AN’s Spa gợi ý cho bạn như: sữa chua, trái cây như bưởi, sầu riêng ri 6, bánh dinh dưỡng, bánh biscotti,...
            Bạn nên chọn lựa quần áo rộng rãi & thoải mái. Ngoài ra, mặc trang phục tập thể dục hoặc yoga khi body massage cũng là một ý hay. Trang phục thoải mái giúp bạn có thể di chuyển cơ thể của mình một cách tự do, không bị gò bó. Do đó, hãy lựa chọn trang phục phù hợp để quá trình body massage tại nhà diễn ra suôn sẻ.

            2. Dụng cụ thực hiện liệu trình massage body
            Trước hết, bạn cần chuẩn bị một chiếc khăn to để trải lên giường hoặc bàn massage. Khăn sẽ bảo vệ phần da tiếp xúc tránh khỏi cọ xát gây tổn thương khi thực hiện các động tác massage.

            Ngoài ra, khăn còn giúp thấm mồ hôi & tinh dầu massage để không rơi ra ngoài gây trơn trượt cản trở quá trình body massage tại nhà.

            Lưu ý, bạn nên sử dụng thêm dầu dưỡng hoặc tinh dầu massage vừa để bôi trơn da vừa giúp da dẻ mịn màng, căng bóng hơn.
            3. Một số kỹ thuật cần có khi thực hiện body massage
            Kỹ thuật xoa: xoa tinh dầu đều khắp vùng được massage rồi thực hiện kỹ thuật xoa bằng lòng bàn tay hoặc ngón tay. Bạn có thể thay đổi tốc độ & lực khác nhau của kỹ thuật xoa để tạo ra nhiều cảm giác. Tuy nhiên, theo khuyến cáo thì chỉ nên dùng lực mạnh cho vùng trung tâm của cơ thể.

            Kỹ thuật xoa bóp: là sự kết hợp lực tay và cách sử dụng tay khi massage. Ở kỹ thuật body massage này thì phần ngón tay & các khớp tay sẽ được sử dụng nhiều hơn. Kỹ thuật xoa bóp được thực hiện tương tự như động tác vuốt ve nhưng sử dụng với lực mạnh hơn.
            Kỹ thuật vuốt: là kỹ thuật đòi hỏi có sự tiếp sức trực tiếp & liên tục giữa lòng bàn tay hoặc đầu các ngón tay lên da của cơ thể. Cần lưu ý luôn vuốt hướng lên trên để tránh tình trạng da bị chảy xệ.

            Kỹ thuật bấm: là việc chủ yếu sử dụng ngón cái để tiếp xúc trực tiếp trên một vùng cơ thể. Kỹ thuật này đòi hỏi xác định chính xác về các huyệt đạo cũng như điểm bấm. Nếu xác định không đúng nó còn gây đến những tác hại nghiêm trọng. Khi sử dụng kỹ thuật body massage này là không bao giờ dùng lực mạnh tại các vùng có mạch máu lớn, khớp xương & cột sống.
            ','trangthai' => '1'],

            ['id'=>6,'iddm' => '5', 'img' => 'matxa2.jpg', 'name' => 'MASSAGE TRỊ LIỆU GIẢI ĐỘC TỐ RA KHỎI CƠ THỂ', 'slug' => Str::slug('MASSAGE TRỊ LIỆU GIẢI ĐỘC TỐ RA KHỎI CƠ THỂ', '-'),'motangan'=>'Massage trị liệu & ăn uống lành mạnh giúp làm sạch độc tố ở tim, gan, phổi, thận, lá lách. Bởi có rất nhiều độc tố trong cơ thể chúng ta như tích tụ thức ăn, ứ máu, đờm, gây nên cảm lạnh, trầm cảm, dễ tức giận…',
            'noidung'=>'
            1. Massage trị liệu thải độc tố ở tim
            Những biểu hiện cho thấy độc tố đang tích tụ ở tim như:

            Dễ bị loét lưỡi.

            Có rất nhiều mụn nổi trên trán.

            Dễ bị mất ngủ và chất lượng giấc ngủ cực kỳ kém, đánh trống ngực.

            Nghiêm trọng nhất là tình trạng xuất hiện ứ máu trong tim, những người bị nhẹ có thể gây ra tức ngực, đánh trống ngực & nghiêm trọng có thể dẫn đến đau ngực dữ dội.
            Cách massage trị liệu giải độc tim:

            - Huyệt Thiếu phủ: Huyệt nằm trong lòng bàn tay, vị trí ở giữa khe xương ngón thứ 4, thứ 5. Xác định bằng cách nắm tay lại, bờ trong của đầu ngón út chạm vào lòng bàn tay ở đâu thì đó là vị trí huyệt. Khi bấm huyệt này dùng lực mạnh một chút, làm lần lượt với tay trái và tay phải.

            massage trị liệu

            - Ăn súp đậu xanh: Đậu xanh có thể hòa tan và trục xuất độc tố ra khỏi tim bằng phương pháp lợi tiểu & giải nhiệt. Lưu ý khi ăn đậu xanh, nên sử dụng ở dạng lỏng như chè đậu xanh hoặc súp đậu xanh. Ăn súp đậu xanh thường xuyên để độc tố được giải ra bên ngoài.

            2. Massage trị liệu giải độc tố ở gan
            Những biểu hiện cho thấy độc tố đang tích tụ ở gan như:

            Trên bề mặt móng tay nổi lên những đường vân, hoặc móng tay bị lõm xuống.

            Tăng sản của tuyến vú, cơn đau tuyến vú tiền kinh nguyệt tăng đáng kể.

            Dễ bị trầm cảm.

            Xuất hiện mụn trứng cá ở trán & mặt, còn xuất hiện đau bụng kinh.

            Cách massage trị liệu giải độc gan:

            - Huyệt Thái xung: Huyệt này nằm trên mu bàn chân. Massage huyệt vị này có giúp giải độc gan rất tốt. Bên cạnh đó giúp đẩy hỏa khí ra bên ngoài. Hỏa khí làm cơ thể bốc hỏa, nóng trong & hạ huyết áp. Những người có tính khí nóng nảy nên thường xuyên bấm huyệt này. Dùng ngón tay cái day bấm huyệt tầm 3 – 5’ với một lực vừa đủ, đến khi cảm thấy hơi tê tê thì dừng. Không nên day huyệt quá mạnh, lần lượt day hai bên chân.
            3. Massage trị liệu giải độc tố ở lá lách
            Những biểu hiện cho thấy độc tố đang tích tụ ở lá lách như:

            Mặt bắt đầu xuất hiện nám. Ngoài ra, phụ nữ bắt đầu xuất hiện nám, tàn nhang trên mặt thông thường có hệ tiêu hóa kém.

            Lá lách chịu trách nhiệm bài tiết trong cơ thể, khí hư quá nhiều là biểu hiện của độ ẩm quá mức trong cơ thể.

            Hơi thở có mùi hôi.

            Xuất hiện mụn trứng cá hoặc loét quanh môi.

            Cách massage trị liệu giải độc lá lách:

            - Huyệt Thương khâu: Huyệt nằm ở chỗ lõm phía dưới mắt cá chân trong. Huyệt có tác dụng: Kiện Tỳ Vị, tiêu thấp trệ, chuyên trụ chỉ các chứng cước khí,  tiêu hóa kém, ruột viêm, chân đau, dạ dày viêm. Dùng ngón tay day vào huyệt Thương khâu cho đến khi thấy cảm giác tê tê là được. Thực hiện mỗi lần khoảng 3’, lần lượt làm với 2 chân.
            ','trangthai' => '1'],

            ['id'=>7,'iddm' => '5', 'img' => 'matxa3.jpg', 'name' => 'THỰC HIỆN HEAD MASSAGE ĐỂ GIẢM ĐAU ĐẦU TẠI NHÀ', 'slug' => Str::slug('THỰC HIỆN HEAD MASSAGE ĐỂ GIẢM ĐAU ĐẦU TẠI NHÀ', '-'),'motangan'=>'Đau đầu hay nhức mỏi cổ vai gáy gây ra không ít phiền toán cho con người. Tuy nhiên, nếu biết cách head massage sẽ giúp tình trạng trên sẽ được cải thiện đáng kể.',
            'noidung'=>'
            1. Head massage giảm đau đầu hiệu quả ngay tại nhà
            Head massage là phương pháp giúp giải tỏa căng thẳng, thư giãn & giảm đau đầu hiệu quả được áp dụng từ ngàn đời nay. Nó không chỉ mang lại lợi ích xua tan mệt mỏi, giảm đau nhức đầu mà còn giúp các cơ tại vùng cổ, vai và gáy được thư giãn.

            Hiện tại chúng ta đang trong mùa giãn cách xã hội nên không thể đến Spa trị liệu để được thực hiện các bài massage trị đau đầu thì bạn có thể áp dụng cách xoa bóp đầu này tại nhà. Chỉ thực hiện vài động tác đơn giản, các bạn hoàn toàn có thể giảm nhanh cơn đau mà không cần phải phụ thuộc vào thuốc giảm đau.
            2. Head massage, xoa bóp đầu
            Động tác thứ nhất: Khép 2 bàn tay & các đầu ngón tay lại sao cho hơi khum rồi day nhẹ lên thái dương. Sau đó miết nhẹ nhàng từ thái dương vòng qua tai đến sau gáy. Thực hiện động tác này từ 3 đến 5 lần. Đây là cách bóp đầu thư giãn rất phổ biến & khá dễ thực hiện tại nhà.
            Động tác thứ hai: Đặt 2 bàn tay lên trán sao cho lòng bàn tay úp vào trong. Sau đó dùng các ngón tay miết nhẹ từ lông mày sang 2 bên rồi dừng tại huyệt thái dương. Lặp lại động tác này khoảng 6 lần.

            Động tác thứ 3: Đặt 2 bàn tay lên trán rồi miết theo đường chéo. Vị trí xuất phát tại 2 hàng lông mày rồi di chuyển lên trán rồi đến đỉnh đầu. Sau đó lấy tay ấn nhẹ lên huyệt bách hội ở đỉnh đầu rồi theo rìa tóc đi đến thái dương, dừng tại đây và day ấn nhẹ.
            3.Head massage bằng cách ấn vào các huyệt trên đỉnh đầu
            Bạn lấy hai ngón tay cái chồng lên nhau, các ngón còn lại thì giữ 2 bên thái dương sau đó ấn ngắt quãng 2,5cm về phía đỉnh đầu. Sau đó tiếp tục thực hiện các động tác tiếp theo. Cách bóp đau đầu này không khó, chỉ cần nghiên cứu tìm hiểu trước sẽ thực hiện được.

            Động tác thứ 1: 4 ngón tay khép lại rồi massage  theo hình xoắn ốc từ vị trí xương chẩm về phía sau đầu. Tiếp tục thực hiện xoa bóp toàn bộ da đầu rồi dừng lại. Các bạn có thể lặp lại động tác này nhiều lần.

            Động tác 2: Luồn tay và kéo tóc - cách xoa bóp đầu này giảm đau rất hiệu quả. Dùng các ngón tay luồn từ chân tóc trên trán rồi massage toàn bộ da đầu. Sau đó nắm vài lọn tóc & kéo thật nhẹ nhàng. Thực hiện như vậy tình trạng đau đầu sẽ hết.

            Động tác thứ 3: Các bạn dùng ngón cái & ngón trỏ xoa bóp từ phần dái tai cho đến đỉnh tai. Thực hiện 2 lần sẽ thấy cơn đau được thuyên giảm.

            Động tác thứ 4: Dùng 2 bàn tay áp vào tai sao cho các ngón tay hướng về phía sau gáy. Dùng 4 ngón tác động vào gáy nhẹ nhàng giống như động tác đánh đàn piano. Chỉ cần thực hiện động tác này 36 lần là hết đau đầu.

            4. Head massage & xoa bóp cổ vai
            Trong các cách xoa bóp đau đầu đây là cách đem lại hiệu quả không kém. Các bạn chỉ cần thực hiện theo các động tác sau đây:

            Động tác 1: Dùng 1 tay hoặc 2 tay xoa bóp từ phần sau cổ. Lưu ý, lòng bàn tay áp sát vào cổ và di chuyển từ phần chân tóc ở gáy xuống đến lưng và sang khớp vai.

            Động tác 2: Sử dụng ngón cái và cạnh lòng bàn tay bóp mạnh từ khớp vai ra đầu vai.

            Động tác 3: Lấy mu bàn tay day nhẹ phần gáy đến cổ. Động tác này thực hiện từ 1 đến 2 phút.

            Một cách khác là các bạn dùng tay tìm đến đốt sống cổ số 7 (đốt này to nhất) và day xung quanh đó. Đây cũng là cách bóp đầu đỡ đau được nhiều người áp dụng hiện nay.
            ','trangthai' => '1'],

            ['id'=>8,'iddm' => '1', 'img' => 'chamsocdamat.jpg', 'name' => 'Chăm sóc da mặt bằng tế bào gốc an toàn tại nhà', 'slug' => Str::slug('Chăm sóc da mặt bằng tế bào gốc an toàn tại nhà', '-'),'motangan'=>'Việc chăm sóc da mặt thường xuyên, là việc mà các chị em hiện nay luôn thực hiện. Nhằm giữ cho da mặt luôn trẻ khỏe, mịn màng và giúp các bạn thêm tươi trẻ hơn.',
            'noidung'=>'
            Lý do nên chăm sóc da bằng tế bào gốc?
            Cuộc sống ngày nay khiến da tiếp xúc với nhiều chất hóa học, bụi bẩn cũng như môi trường bị ô nhiễm. Khí cho làn da trở nên kém sắc, da bắt đầu trở nên tệ hơn và xuất hiện các nếp nhăn, vết thâm, các nốt mụn và khiến da trở nên lão hóa nhanh hơn,… Từ đó, nhu cầu làm đẹp và chăm sóc da cũng được các chị em chú trọng và chúng ngày càng phát triển hơn.

            Nguyên nhân cần thực hiện chăm sóc da tế bào gốc
            Nguyên nhân cần thực hiện chăm sóc da tế bào gốc
            Vì một khi da trở nên tệ, kém sắc sẽ khiến cho chị em mất tự tin và lo lắng. Nếu da của bạn không được chăm sóc kịp thời, đúng cách sẽ làm cho da ngày một nghiêm trọng và hư tổn nhiều hơn.

            Trong các loại hình cũng như các phương pháp chăm sóc da, thì liệu trình chăm sóc da mặt bằng tế bào gốc là phương pháp mang đến hiệu quả nhất. Tế bào gốc là liệu trình làm đẹp và chăm sóc da hiện đại, tiên tiến nhất hiện nay, được nhiều chị em lựa chọn.

            Nhờ vào liệu trình thực hiện chăm sóc da đơn giản, mang đến hiệu quả cao và vô cùng an toàn. Giúp da mặt của bạn trở nên mịn màng, trẻ hóa, căng mọng và rạng ngời, làm chạm quá trình lão hóa trên da.

            Tế bào gốc là gì?
            Tế bào gốc là một loại tế bào có công dụng phân bào và biệt hóa, có tác dụng thúc đẩy tăng hàm lượng collagen cho da, giúp da duy trì cấu trúc da, làm da săn chắc, đàn hồi. Tế bào gốc càng phát hoạt động mạnh mẽ sẽ càng giúp cho da lão hóa lâu hơn, làm tăng sức đề kháng giúp da mạnh khỏe hơn.

            Tế bào gốc đóng vai trò rất quan trọng với làn da
            Tế bào gốc đóng vai trò rất quan trọng với làn da
            Phân bào: Là quá trình các tế bào trong da nguyên phân, cùng với giảm phân giúp tạo nên các tế bào mới cho da.
            Biệt hóa: Là quá trình cơ thể thực hiện quá trình biến đổi, chuyển hóa thành tế bào mới.
            Hiện nay, các loại tế bào gốc có rất nhiều loại khác nhau, trong đó sử dụng tế bào gốc tự thân và tế bào gốc chế phẩm là 2 loại được sử dụng nhiều nhất trong ngành thẩm mỹ.

            Tham khảo thêm về tế bào gốc trị mụn để bỏ túi nhiều kinh nghiệm hơn cho mình nhé.

            Công dụng của tế bào gốc đối với làn da
            Giúp làm chậm quá trình lão hóa ở da
            Chăm sóc da mặt bằng tế bào gốc, mang đến công dụng làm chậm đi quá trình lão hóa của da mặt. Hỗ trợ làm mờ cũng như xóa đi các nốt nám, nếp nhăn trên da và giúp cho da trở nên ngày một trẻ hóa hơn. Làn da cũng một ngày trở nên căng mịn, tràn đầy sức sống và trắng sáng, hồng hào hơn.

            Có thể nói, so với các phương pháp làm đẹp và chăm sóc da khác, việc chăm sóc da mặt bằng tế bào gốc là phương pháp làm đẹp da hiệu quả nhất với thời gian thực hiện ngắn nhất. Sau khi thực hiện liệu trình đầu tiên, bạn sẽ cảm nhận được làn da có sự thay đổi rõ rệt.

            Tế bào gốc có công dụng chống lão hóa diễn ra trên da mặt
            Tế bào gốc có công dụng chống lão hóa diễn ra trên da mặt
            Kích thích sản sinh collagen
            Liệu trình chăm sóc da mặt bằng tế bào gốc mang đến công dụng, thúc đẩy và kích thích cơ thể sản sinh thêm hàm lượng collagen. Giúp da tình trạng da trở nên ổn định và đàn hồi hơi. Không chỉ có vậy, liệu trình tế bào gốc còn hỗ trợ da loại bỏ một số vấn đề trên da như: trị sẹo lõm, trị sẹo lâu năm, trị sẹo lồi,…

            Từ đó, mang đến khả năng nuôi dưỡng da chuyên sâu và hỗ trợ da được tái tạo, cải thiện làn da từ sâu bên trong.

            Khả năng trị nám da
            Không chỉ giúp chăm sóc da tốt hơn, liệu trình tế bào gốc còn mang khả năng điều trị các vết nám da, tàn nhang hiệu quả. Chúng được xem như một loại sản phẩm làm đẹp, giúp cân bằng sắc tố trên da giúp làm trắng da và giúp da trở nên trắng mịn, đều màu hơn.

            Tế bào gốc giúp loại bỏ các vùng da bị nám, da đều màu hơn
            Tế bào gốc giúp loại bỏ các vùng da bị nám, da đều màu hơn
            Loại bỏ các loại mụn
            Cùng với công dụng thúc đẩy sản sinh collagen trong cơ thể, chăm sóc da mặt tế bào gốc còn có tác dụng điều trị mụn và ngăn ngừa tình trạng mụn xuất hiện hiệu quả. Phương pháp này mang đến công dụng loại bỏ hoàn toàn các nốt mụn có trên da mặt như: mụn ẩn, mụn đầu đen, mụn cám,… Đây là một trong những công dụng tuyệt vời của liệu trình chăm sóc da này.

            Chăm sóc da mặt bằng tế bào gốc mang đến cho bạn nhiều công dụng tối ưu, giúp da trở nên trẻ mạnh hơn. Phương pháp này bạn có thể đến các cơ sở thẩm mỹ để thực hiện, hoặc thực hiện tại nhà.

            Quy trình chăm sóc da mặt bằng tế bào gốc tại nhà
            Với cách thực hiện làm đẹp, chăm sóc cùng tế bào gốc tại nhà, bạn cần tuân thủ các bước sau:

            Làm sạch da mặt với sữa rửa mặt
            Cần làm sạch da mặt đầu tiên
            Cần làm sạch da mặt đầu tiên
            Việc đầu tiên trước khi bắt đầu thực hiện chăm sóc da, bạn cần thực hiện công tác làm sạch bề mặt da và giúp lỗ chân lông thông thoáng. Nhằm loại bỏ các bã nhờn, vi khuẩn nằm sâu trong lỗ chân lông, giúp lỗ chân lông sạch và hấp thụ các chất dinh dưỡng từ tế bào gốc tốt nhất, giúp tăng hiệu quả, cải thiện da.

            Bạn nên sử dụng phương pháp tẩy trang rồi đến sữa rửa mặt, để giúp làn da sạch sâu. Sữa rửa mặt sẽ đánh bay các lớp cặn bẩn còn thường của bước tẩy trang, giúp làm sạch da hiệu quả. Bạn nên sử dụng nước sạch ấm để sử dụng cùng sữa rửa mặt, vì nước ấm sẽ giúp lỗ chân lông giãn nở, giúp việc loại bỏ bã nhờn tốt hơn. Nên thực hiện vệ sinh với sữa rửa mặt 2 lần sáng và tối mỗi ngày.

            Loại bỏ lớp sừng trên da với tẩy tế bào chết
            Sau khi đã thực hiện vệ sinh da với sữa rửa mặt, bạn bắt đầu thực hiện việc loại  bỏ lớp sừng và tế bào chết bám trên da, bằng sản phẩm tẩy tế bào chết. Việc tẩy tế bào chết giúp da mặt được thông thoáng, trở nên mềm mịn hơn và hấp thụ các chất dinh dưỡng từ các bước sau tốt hơn.

            Ngoài ra, việc tẩy tế bào chết còn mang đến công dụng, ngăn ngừa tiết dầu nhiều và hạn chế được tình trạng lỗ chân lông bị tắc nghẽn gây nên mụn.
            ','trangthai' => '1'],

            ['id'=>9,'iddm' => '1', 'img' => 'csdm2.jpg', 'name' => 'Các bước chăm sóc da mặt hằng ngày giúp da sáng mịn, sạch mụn', 'slug' => Str::slug('Các bước chăm sóc da mặt hằng ngày giúp da sáng mịn, sạch mụn', '-'),'motangan'=>'Không phải tự nhiên mà chúng ta sở hữu được một làn da tươi sáng, mịn màng và khỏe đẹp. Vậy phải làm thế nào để có được làn da tươi sáng, khỏe và rạng rỡ?',
            'noidung'=>'
            1. Tại sao cần phải chăm sóc da hằng ngày
            Hằng ngày, da mặt chúng ta tiếp xúc với các tác nhân gây hại như: tia UV, khói bụi, nhiệt độ... Bên cạnh đó, da mặt còn chịu tác động từ nhiều yếu tố bên trong như: stress, sắc tố cơ thể, thiếu hụt các chất dinh dưỡng,... Những điều này khiến da bị tổn thương.

            Chính vì những lí do trên, việc vệ sinh và chăm sóc da mặt là điều vô cùng cần thiết. Vệ sinh và chăm sóc da hằng ngày sẽ giúp làn da khỏe mạnh, căng bóng, mịn màng và rạng rỡ. Việc chăm sóc hằng ngày còn giúp chúng ta đẩy lùi khả năng gây mụn, đồng thời giúp làm chậm quá trình lão hóa da.

            Lão hóa da

            Tuy nhiên, không hẳn ai cũng biết cách chăm sóc và vệ sinh da mặt đúng cách. Nếu các bước vệ sinh và chăm sóc da mặt không đúng sẽ làm tác dụng ngược lại gây mụn ẩn và nhiều vấn đề khác.

            2. Các bước chăm sóc da mặt hằng ngày giúp da sáng mịn, sạch mụn
            Bước 1: Tẩy trang
                Các chị em thường có suy nghĩ bước tẩy trang này chỉ dùng cho những chị em make up. Tuy nhiên suy nghĩ đó hoàn toàn sai bởi vì hằng ngày làn da chúng ta tiếp xúc với khói bụi bên ngoài môi trường. Những bụi bẩn này sẽ bám sâu vào da bạn, lúc này bước tẩy trang sẽ giúp bạn lấy đi những bụi bẩn trên da mặt mà không khiến da bạn bị khô.

                Tẩy trang

                Hãy lưu ý khi chọn mua tẩy trang, hạn chế mua những loại nước tẩy trang chứa cồn và có chứa chất tẩy rửa mạnh. Nước tẩy trang dạng dầu là lựa chọn phù hợp dành cho bạn.

                Làm sạch da mặt bằng cách lấy một lượng tẩy trang vừa đủ sau đó massage nhẹ nhàng. Đừng quên sử dụng một ít nước để làm sạch da sau khi massage bằng dầu tẩy trang để tránh lượng dầu tẩy trang còn vương trên da mặt.

            Bước 2: Dùng sữa rửa mặt
                Một số loại nước tẩy trang không có khả năng làm sạch các bụi bẩn trên da mặt. Do đó để đảm bảo da mặt bạn được làm sạch hoàn toàn thì đừng nên bỏ qua bước này.

                Sữa rửa mặt

                Đối với một số bạn sở hữu làn da khô thì đừng nên chọn loại sữa rửa mặt dạng bọt bởi sữa rửa mặt tạo bọt sẽ làm sạch các tuyến dầu khiến cho da bị khô và mất cân bằng ẩm. Thay vì vậy, sữa rửa mặt dạng kem, dạng sữa hoặc dạng gel không tạo bọt là phương án phù hợp cho những bạn có làn da khô.

            Bước 3: Tẩy da chết
                Cơ thể chúng ta luôn luôn sản sinh ra các tế bào mới, chính vì vậy bạn cần làm sạch và tẩy đi tế bào chết trên da mặt. Việc tẩy tế bào chết sẽ giúp bạn lấy đi lớp sừng và tế bào chết còn bám chặt trên da, giúp thông thoáng lỗ chân lông, làm đều màu da.

                Tẩy tế bào chết

                Bước tẩy da chết khá đơn giản, bạn chỉ cần lấy một lượng sản phẩm tẩy tế bào chết sau đó massage nhẹ nhàng bằng tay. Sau đó làm sạch da mặt bằng nước.

                Lưu ý: Bạn chỉ nên tẩy da chết 2 - 3 lần/ tuần để tránh làm tổn thương da mặt.
                Bước 4: Toner
                Sau khi làm sạch da, thì bước này sẽ giúp cung cấp các dưỡng chất cần thiết dành cho da. Cụ thể Toner sẽ giúp tăng độ đàn hồi, cân bằng lại độ pH tự nhiên. Từ đó giúp làn da của bạn trở nên mịn màng và mềm mại. Bên cạnh đó, Toner còn giúp làm sạch sâu lớp bụi bẩn “cứng đầu” còn bám lại sau khi rửa mặt.

            Sử dụng Toner

            Tùy vào sở thích và loại da mà mỗi người có thể chọn cho mình một loại toner khác nhau. Tuy nhiên bạn cần lưu ý rằng da của bạn thuộc loại da nào trước khi chọn mua Toner cho mình nhé!

            Bước 5: Đặc trị
            Đối với một số bạn có làn da gặp những vấn đề như mụn, nám, sạm,... thì sau bước toner bạn cần sử dụng các sản phẩm đặc trị để cải thiện làn da của mình.

            Những sản phẩm chứa các hoạt chất BHA, AHA hay Retinol bạn nên thoa và để yên trên da từ 20 đến 30 phút để các hoạt chất hoạt động trước khi tiếp tục bước serum hay dưỡng ẩm.

            Nám, tàn nhang

            Bước 6: Dưỡng ẩm
            Với bất kì các cô gái nào muốn có làn da bóng mịn khỏe và rạng rỡ thì không thể bỏ qua bước này. Bước dưỡng ẩm này giúp cung cấp độ ẩm cho da khiến da bạn căng mịn và có độ đàn hồi cao.

            Dưỡng ẩm

            Cũng tương tự như Toner, tùy vào sở thích cũng như loại da của bạn để chọn mua dưỡng ẩm. Những sản phẩm dưỡng ẩm có chứa Hyaluronic acid là một trong những lựa chọn thích hợp dành cho bạn đấy!

            Bước 7: Bảo vệ da với kem chống nắng
            Nếu thiếu kem chống nắng thì những bước chăm sóc da mặt của bạn cũng trở nên không còn hữu ích. Hãy đảm bảo rằng da bạn được bảo vệ an toàn khi đi ra ngoài. Đừng quên bôi kem chống nắng kể cả những ngày trời có nhiều mây bởi tia UV có khả năng len lỏi qua những đám mây và tiếp xúc với da của bạn. Bạn có thể bỏ qua bước này vào ban đêm.
            ','trangthai' => '1'],

            ['id'=>10,'iddm' => '1', 'img' => 'csdm3.jpg', 'name' => 'Hướng dẫn chăm sóc da mặt mùa hè', 'slug' => Str::slug('Hướng dẫn chăm sóc da mặt mùa hè', '-'),'motangan'=>'Thời tiết nóng bức, gay gắt đã gây ra vấn đề về da như mụn bọc, cháy nắng, đen sạm,...Để bảo vệ làn da phụ nữ cần biết cách chăm sóc làn da một cách khoa học và hợp lý.',
            'noidung'=>'
            1. Rửa mặt bằng sữa rửa mặt thích hợp
            Rửa mặt bằng nước không thể làm sạch hết các chất nhờn và bụi bẩn trên mặt. Do đó, sữa rửa mặt sẽ giúp loại bỏ mồ hôi, lớp dầu trên da, làm sạch sâu những bụi bẩn, cặn bã và những lớp tế bào da lão hóa từ sâu bên trong. Nhờ đó, giúp ngăn chặn các vấn đề về da đặc biệt là mụn.

            Ngoài ra, sửa rửa mặt còn có tác dụng làm sáng da, tạo điều kiện thuận lợi để các dưỡng chất có trong kem dưỡng trắng, kem dưỡng ẩm,... có thể dễ dàng thấm sâu vào bên trong làn da.

            Tuy nhiên việc chọn loại sữa rửa mặt phù hợp cũng vô cùng quan trọng. Các bạn gái có làn da nhạy cảm nên chọn các loại sữa rửa mặt dịu nhẹ. Còn nếu sở hữu làn da thiên dầu, dễ nổi mụn, hãy lựa chọn các loại sữa rửa chuyên biệt, với các thành phần có khả năng làm sạch sâu lớp dầu nhờn và những bẩn trên da.

            Thời tiết nóng bức, gay gắt đã gây ra vấn đề về da như mụn bọc, cháy nắng, đen sạm,...Để bảo vệ làn da phụ nữ cần biết cách chăm sóc làn da một cách khoa học và hợp lý.

            1. Rửa mặt bằng sữa rửa mặt thích hợp
            Rửa mặt bằng nước không thể làm sạch hết các chất nhờn và bụi bẩn trên mặt. Do đó, sữa rửa mặt sẽ giúp loại bỏ mồ hôi, lớp dầu trên da, làm sạch sâu những bụi bẩn, cặn bã và những lớp tế bào da lão hóa từ sâu bên trong. Nhờ đó, giúp ngăn chặn các vấn đề về da đặc biệt là mụn.

            Ngoài ra, sửa rửa mặt còn có tác dụng làm sáng da, tạo điều kiện thuận lợi để các dưỡng chất có trong kem dưỡng trắng, kem dưỡng ẩm,... có thể dễ dàng thấm sâu vào bên trong làn da.

            Tuy nhiên việc chọn loại sữa rửa mặt phù hợp cũng vô cùng quan trọng. Các bạn gái có làn da nhạy cảm nên chọn các loại sữa rửa mặt dịu nhẹ. Còn nếu sở hữu làn da thiên dầu, dễ nổi mụn, hãy lựa chọn các loại sữa rửa chuyên biệt, với các thành phần có khả năng làm sạch sâu lớp dầu nhờn và những bẩn trên da.

            Thử sức cùng Trắc nghiệm: Bận rộn có ảnh hưởng đến sức khỏe của bạn không?
            Cuộc sống hiện đại khiến chúng ta vì quá bận rộn mà quên chăm sóc sức khỏe cho chính mình. Ai cũng biết rằng lịch trình làm việc cả ngày có thể khiến bạn kiệt sức, nhưng cụ thể bận rộn ảnh hưởng thế nào tới sức khỏe? Hãy cùng làm thử bài trắc nghiệm dưới đây.

            Nội dung được tham vấn chuyên môn cùng Bác sĩ Cao cấp, Bác sĩ chuyên khoa II Đoàn Dư Đạt - Khoa khám bệnh & Nội khoa - Bệnh viện Đa khoa Quốc tế Vinmec Hạ Long.

            2. Tẩy tế bào chết đều đặn
            Các tế bào chết nằm trên trên bề mặt da, dễ khiến da bị xỉn màu, kém sức sống và ngăn chặn các dưỡng chất từ những sản phẩm chăm sóc da thấm sâu vào bên trong da. Các chuyên gia làm đẹp khuyên nên tẩy tế bào chết đều đặn, khoảng 2-3 lần/tuần để loại bỏ lớp tế bào đã lão hóa, tạo điều kiện cho các tế bào da mới sinh sôi.

            3. Thoa kem chống nắng hằng ngày
            Hướng dẫn chăm sóc da mặt mùa hè
            Thoa kem chống nắng hằng ngày
            Mùa hè là thời điểm tăng cường bảo vệ làn da khỏi tia UV. Các vật dụng che chắn thông thường như khẩu trang, váy chống nắng,...không thể bảo vệ làn da một cách toàn diện. Do đó, việc thoa kem chống nắng hằng ngày là vô cùng quan trọng, kể cả khi trời râm mát hay khi đang ở trong nhà vì tia UV vẫn luôn hiện diện.

            Trên thị trường hiện nay có nhiều loại kem chống nắng phù hợp với nhu cầu đa dạng của khách hàng. Nếu sở hữu làn da dầu nhờn, hãy chọn các loại kem chống nắng có kết cấu mỏng nhẹ và khả năng kiềm dầu tốt.

            4. Dưỡng ẩm cho da
            Nhiều sở hữu làn da dầu, đặc biệt trong mùa hè dầu và bã nhờn càng tiết ra nhiều hơn khiến da “bóng lưỡng” nên nghĩ rằng việc dưỡng ẩm là không cần thiết. Đây là một quan niệm hoàn toàn sai. Nguyên nhân khiến da tiết ra nhiều bã nhờn là do bề mặt da thiếu nước và độ ẩm nên cơ thể mới bài tiết ra các chất nhờn nhằm giúp cân bằng độ ẩm cho da. Việc dùng kem dưỡng ẩm hay toner cấp ẩm cho da sẽ giúp hạn chế được lượng dầu nhờn tiết ra và cải thiện da tốt hơn.

            5. Đắp mặt nạ đều đặn
            Đắp mặt nạ dưỡng da nhằm cung cấp dưỡng chất cho làn da, tạo điều kiện cho làn da phục hồi khỏe mạnh và sáng đẹp. Không nhất thiết phải sử dụng đến các loại mặt nạ đắt tiền mà có thể tận dụng các loại trái cây và rau củ quen thuộc, có rất nhiều trong mùa hè như dưa leo, dưa hấu, bơ, cà chua, khoai tây... kết hợp cùng sữa tươi hoặc sữa chua không đường. Các loại mặt nạ dưỡng da từ thiên nhiên không chỉ đem lại hiệu quả trong việc ngăn ngừa mụn và cải thiện làn da cháy nắng trong mùa hè mà còn không gây kích ứng nào làn da, thích hợp cho cả da thường lẫn da dầu nhờn hoặc nhạy cảm.

            ','trangthai' => '1'],

            ['id'=>11,'iddm' => '1', 'img' => 'cmdm4.jpg', 'name' => 'Bí quyết chăm sóc da theo từng độ tuổi', 'slug' => Str::slug('Bí quyết chăm sóc da theo từng độ tuổi', '-'),'motangan'=>'Ở mỗi giai đoạn, độ tuổi khác nhau thì cấu tạo làn da sẽ thay đổi, sự thay đổi này đòi hỏi lộ trình chăm sóc da cũng cần phải thay đổi để có thể phù hợp với nhu cầu của da.',
            'noidung'=>'
            Nếu như chỉ dùng một loại sản phẩm chăm sóc da từ lúc dậy thì cho đến độ tuổi ngoài 50 sẽ không mang lại hiệu quả cao. Vì vậy, để duy trì nhan sắc cũng như ngăn chặn mọi dấu hiệu lão hóa bạn nên lựa chọn từng loại sản phẩm dành riêng cho mình cùng chế độ chăm sóc da hợp lý.
            Mỹ phẩm dành cho mọi độ tuổi
            Kem chống nắng
            Dù bạn ở độ tuổi nào thì kem chống nắng chính là sản phẩm làm đẹp “bất ly thân”, theo như nghiên cứu, để bảo vệ làn da khỏi tia bức xạ mặt trời thì bạn cần phải thoa kem chống nắng mỗi ngày, kể cả trong những ngày nhiều mây.

            Nhiều người thường cho rằng việc sử dụng kem chống nắng có chỉ số SPF càng cao thì khả năng ngăn ngừa ung thư da càng cao. Tuy nhiên, trên thực tế những người sử dụng kem chống nắng có SPF từ 50 trở lên có xu hướng sẽ có trong nắng nhiều hơn mà không thoa lại kem.
            Từ đây sẽ làm gia tăng nguy cơ tiếp xúc với bức xạ tia cực tím cao hơn. Vì vậy, các chuyên gia cho rằng lựa chọn kem chống nắng “phổ rộng” có ít nhất chỉ số SPF 30 là an toàn và tối ưu hơn cả.

            Ở mỗi độ tuổi khác nhau, sẽ có cách chăm sóc da mặt khác nhau
            Cấu trúc da mặt mỗi người không giống nhau, thay đổi theo từng độ tuổi, đặc biệt ở những mốc quan trọng như tuổi 20, 30, 40. Do đó nếu vẫn giữ thói quen sử dụng những loại sản phẩm như trước kia sẽ giảm bớt phần nào hiệu quả mà chúng đem lại.
            Hãy tìm hiểu kỹ lưỡng, tự lập cho mình một kế hoạch chăm sóc da phù hợp. Điều quan trọng nhất cần sự kiên trì, không nóng vội chờ đợi sự cải thiện tích cực trên gương mặt.

            Chăm sóc da mặt ở độ tuổi 20
            Độ tuổi này là lúc làn da sản sinh collagen, elastin mạnh nhất – hai nguyên tố quan trọng quyết định tới sự đàn hồi trong cấu trúc, căng da mặt. Việc chăm sóc da trở nên dễ dàng hơn và chỉ cần đảm bảo ba yếu tố: làm sạch, dưỡng ẩm, bảo vệ khỏi những tác nhân gây hại, đủ trở thành tiền đề cho một làn da đẹp sau này.

            Nên lựa chọn những sản phẩm phù hợp, lành tính với cơ thể. Chẳng hạn chỉ dùng sữa rửa mặt có độ pH từ 4.5-5.5, kem dưỡng ẩm có kết cấu lỏng, dễ thấm, kem chống nắng hàng ngày có chỉ số SPF dao động 30-50.
            Chăm sóc da mặt ở độ tuổi 30
            Giai đoạn này, các nếp nhăn, sạm da xuất hiện “ồ ạt” hơn và bạn phải thật sự nghiêm túc trong hành trình “đánh đuổi lão hóa”.  Để đạt được điều này, ngoài áp dụng các sản phẩm chuyên sâu còn nên bổ sung những thực phẩm có chứa dầu omega-3, mầm đậu nành, vitamin…để trẻ hóa từ bên trong.

            Bí quyết làm căng da mặt này nên được thực hiện mỗi ngày để đạt được hiệu quả tốt nhất. Bên cạnh những dòng mỹ phẩm cơ bản, hãy kết hợp với một số những loại kem dưỡng mắt, chăm đắp mặt nạ đồng thời tẩy da chết thường xuyên.

            Chăm sóc da mặt ở độ tuổi 40
            Mức độ lão hóa đã gia tăng ở mức cao, cấu trúc da trở nên lỏng lẻo, kém đàn hồi, thiếu hụt trầm trọng collagen và nếu không kiểm soát kịp thời, gương mặt sẽ trở nên thiếu sức sống, già nua hơn trông thấy. Vì vậy, cần phải nỗ lực hơn nữa trong công cuộc chăm sóc sắc đẹp.

            Một số những sản phẩm không thể thiếu được chính là serum chống nhăn, dầu dưỡng có chứa thành phần thiên nhiên, áp dụng những động tác massage mỗi ngày hỗ trợ phần nào sự chảy xệ trên gương mặt. Trong trường hợp đã quá muộn để cứu vãn, bạn nên nhờ cậy tới các dịch vụ thẩm mỹ mới mong đạt được kì tích.

            Tránh tẩy da chết quá thường xuyên
            Ngay cả khi bạn tránh được nguy cơ bị khô hoặc bong da thì bạn vẫn phải hạn chế việc tẩy da chết thường xuyên. Bạn sẽ phạm sai lầm nghiêm trọng nếu loại bỏ các chất dầu tự nhiên ra khỏi làn da. Hãy áp dụng phương pháp dưỡng ẩm để tẩy da chỉ mỗi tháng một lần.

            Chống lại ảnh hưởng của gió nóng

            Ngay thời điểm bạn bước ra ngoài trong một ngày trời gió dữ dội, bạn phải chiến đấu để chống lại nó. Cách tốt nhất để tránh một làn da nứt nẻ là phải che chắn cho thật kín.

            >>> Có thể bạn muốn biết: Tìm hiểu các bệnh về Da.
            Đầu tiên là hãy bôi một loại dưỡng ẩm mạnh hơn bình thường có nguồn gốc từ dầu để dưỡng da, cũng như chống lại ảnh hưởng của gió nóng. Sau đó bạn cần đeo khẩu trang để chen chắn cho da. Nếu gió nóng xuất hiện, hãy sử dụng chất dưỡng làm êm dịu vào ban đêm, đến sáng hôm sau, bạn sẽ thấy khá hơn nhiều.

            Đừng bỏ qua kem chống nắng

            Mặc dù bạn liều lĩnh ra ngoài mà không có kem chống nắng nhưng nó cần thiết vào mùa đông cũng như mùa hè để giữ cho làn da đẹp.
            Chỉ đi bộ khoảng hai đến 3 phút cũng đủ làm tổn hại đến làn da dù vào mùa đông tia UVB không nhiều lắm, thậm chí chúng không còn mạnh nhưng vẫn đủ sức làm tổn hại đến làn da.

            Sức nóng tăng

            Sức nóng của thời tiết sẽ làm da bạn khô vào ban đêm, đó là lý do tại sao bạn thức dậy với một làn da khô hơn khi lúc đi ngủ. Cố gắng dưỡng ẩm gấp đôi trước khi đi ngủ sẽ cải thiện phần nào tình trạng khô da vào ban đêm.
            Vệ sinh tay sạch sẽ

            Vệ sinh tay là cách tốt nhất để chống lại vi khuẩn sinh sôi vào mùa đông, vì chúng có tác dụng làm khô da. Khi làn da bị khô, vi khuẩn sẽ thâm nhập bằng các vết nứt cực nhỏ ở bàn tay.

            Nếu bạn thường vệ sinh tay thì hãy chắc rằng bạn sử dụng nước rửa tay ngay khi chúng dần khô để giữ bàn tay bạn mềm mại và sạch vi khuẩn.

            Chọn lựa kem dưỡng

            Chọn lựa kem dưỡng da phù hợp là yếu tố quan trọng để có làn da đẹp.
            Nếu bạn có hàng tá kem dưỡng thể thì hãy sử dụng chúng thật hiệu quả. Kem dưỡng tốt hơn nước dưỡng thể trong mùa đông bởi vì chúng dày hơn, vì thế dưỡng ẩm tốt hơn.

            ','trangthai' => '1'],

        ]);
        DB::table('donhang')->insert([
            ['id'=>1,'idkhachhang'=>'1','idgiamgia'=>'1', 'tennguoinhan'=>'Hương','diachikhachhang'=> 'Công viên phần mềm Quang Trung , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'15000000' ,'tongtiensaugiamgia'=>'15000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthai'=>0,'trangthaithanhtoan'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>2,'idkhachhang'=>'2','idgiamgia'=>'2', 'tennguoinhan'=>'Hùng','diachikhachhang'=> '345/3 Tổ 29 , Khu phố 2 , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737032' ,'tongtientruocgiamgia'=>'21000000' ,'tongtiensaugiamgia'=>'20000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'BE','trangthai'=>1,'trangthaithanhtoan'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>3,'idkhachhang'=>'3','idgiamgia'=>'3', 'tennguoinhan'=>'Ly Ly','diachikhachhang'=> '186 , Phường Thái Hà , Q.Đống Đa , Hà Nội','sdtnguoinhan'=>'0845737033' ,'tongtientruocgiamgia'=>'5000000' ,'tongtiensaugiamgia'=>'5500000','ghichucuakhachhang'=> 'Em sẽ nhận được đơn hàng full tuần nha ạ','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'DHL','trangthai'=>2,'trangthaithanhtoan'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>4,'idkhachhang'=>'4','idgiamgia'=>'2', 'tennguoinhan'=>'Thảo','diachikhachhang'=> '415 Nguyễn Trãi , Phường 7 , Q.5 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'30000000' ,'tongtiensaugiamgia'=>'28000000','ghichucuakhachhang'=> '','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthai'=>4,'trangthaithanhtoan'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>5,'idkhachhang'=>'5','idgiamgia'=>'1', 'tennguoinhan'=>'Thảo Mai','diachikhachhang'=> 'Tầng 1, 28 Seongam-ro 13-gil, Mapo-gu, Seoul','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'35000000' ,'tongtiensaugiamgia'=>'30000000','ghichucuakhachhang'=> '주문은 이번주말에 받아볼께요 감사합니다','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'FEDEX','trangthai'=>0,'trangthaithanhtoan'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
        ]);
        DB::table('sanpham')->insert([
            ['id'=>1,'iddanhmuc'=>1,'idthuonghieu'=>9,'name'=>'LA MER The Treatment Lotion Hydrating Mask - Mặt nạ tái tạo da', 'slug'=> Str::slug('LA MER The Treatment Lotion Hydrating Mask - Mặt nạ tái tạo da', '-'),'img'=>'["profile-photo-1635519235.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=> 'Mặt nạ “siêu dưỡng da” được ngâm trong 30ml The Treatment Lotion ngay lập tức mang đến sự tăng cường hydrat hoá giúp chữa lành,','noidung'=>'Mặt nạ tấm với công nghệ ôm sát của Nhật Bản và hàng triệu sợi vi mô tinh khiết độc đáo tăng cường sự tập trung của quá trình hydrat hóa chữa lành, làm rạng rỡ, đầy đặn và truyền vào da một nguồn năng lượng mạnh mẽ có tác dụng hồi sinh làn da chỉ trong tíc tắc.

            - Kết cấu vi mô độc đáo của các sợi phản lực tinh khiết nhẹ nhàng ôm lấy làn da để chúng ta có thể hoạt động trong khi sử dụng mặt nạ.

            - “Thuốc tiên” Miracle Broth tái tạo và phục hồi các chức năng tự nhiên của da, làm mờ các khuyết điểm, làm mịn và làm đầy rãnh nhăn, se khít lỗ chân lông.

            - Phức hợp tái tạo lên men độc quyền với sự kết hợp của tảo và 73 khoáng chất từ biển cung cấp độ ẩm sâu và bổ sung các tế bào da.

            - Làm dịu làn da kích ứng, mẩn đỏ và cải thiện kết cấu da.

            Giải pháp cho: da khô, xỉn màu, mất kết cấu, da lão hoá, chảy sệ...

            Công dụng chính: dưỡng ẩm và giữ ẩm, dưỡng sáng và rạng rỡ, làm dịu kích ứng, làm đầy các rãnh và xoá mờ nếp nhăn...

            Phù hợp với mọi loại da, kể cả da nhạy cảm, kích ứng.

            Sản xuất tại Nhật Bản' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>2,'iddanhmuc'=>2,'idthuonghieu'=>9,'name'=>'LA MER The Moisturizing Cream - Kem dưỡng ẩm da khô, hư tổn', 'slug'=> Str::slug('LA MER The Moisturizing Cream - Kem dưỡng ẩm da khô, hư tổn', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=> 'Một loại kem giàu dưỡng chất cùng với độ ẩm sâu nhất giúp ngay lập tức mang lại làn da ẩm mọng,','noidung'=>'Với khả năng hydrat hóa cao và cải thiện sự khô da chỉ trong ba ngày, kem dưỡng siêu giàu ẩm này truyền vào da một độ ẩm sâu tức thì và kéo dài cả ngày. Giúp làm dịu rõ rệt làn da nhạy cảm và kích ứng.

             - Chứa thành phần tái tạo tế bào Miracle Broth™ - "thuốc tiên" huyền thoại có trong mọi sản phẩm La Mer - truyền vào da những lợi ích tái tạo có nguồn gốc từ biển, chữa lành và làm đầy, làm mịn các các nếp nhăn, để lộ sự rạng rỡ mới cho làn da.

             - Chiết xuất trà chanh - thành phần chống oxy hoá mạnh mẽ của La Mer - tăng cường hàng rào tự nhiên của da, bảo vệ chống lại sự căng thẳng và ô nhiễm môi trường cho một làn da sáng và tinh khiết.

             - Sữa chữa các khuyết điểm trên da như nếp nhăn, sẹo thâm và thu nhỏ lỗ chân lông.

             - Mang lại sự săn chắc, khoẻ mạnh, đầy sức sống và phục hồi làn da.

             Phù hợp cho mọi loại da, đặc biệt là các loại da khô, siêu khô, da tổn thương do kem trộn hay da nhạy cảm sau điều trị.

             Không chứa Paraben, Phthalates, Sulfates, Sulfites.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>3,'iddanhmuc'=>3,'idthuonghieu'=>9,'name'=>'LA MER The Lip Volumizer - Son dưỡng làm dày môi', 'slug'=> Str::slug('LA MER The Lip Volumizer - Son dưỡng làm dày môi', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=> 'Son dưỡng làm mềm và làm mờ các rãnh nhăn trên môi, đồng thời làm căng mọng bờ môi,','noidung'=>'Một công thức không chỉ làm đầy và hoàn thiện đôi môi, mà còn giúp bảo vệ chống lại thiệt hại trong tương lai bởi vì làn da môi mỏng manh của chúng ta đặc biệt dễ bị tổn thương bởi các tác nhân gây hại từ môi trường.

            Phương pháp điều trị huyền thoại của La Mer Miracle Broth™ được bào chế với các chất chống oxy hóa giúp bảo vệ đôi môi, ngay lập tức làm đầy đặn và làm rõ các đường nét.

            Nuôi dưỡng da môi bằng hydrat hoá chữa lành tự nhiên, mọi vấn đề như khô nẻ sẽ được giải quyết triệt để.

            Thành phần nổi bật:

            - Miracle Broth™ - công thức với tảo biển giàu dinh dưỡng và các thành phần nguyên chất khác ngâm da trong khả năng chữa bệnh huyền thoại của biển, giúp hỗ trợ quá trình sửa chữa tự nhiên và độ ẩm cho da.

            - Lime Tea Concentrate: hỗn hợp chống oxy hóa tăng áp này giúp bảo vệ làn da mỏng manh chống lại tác hại của môi trường.

            - Phức hợp tái tạo làm đầy: công thức với các thành phần biển và khoáng chất giàu dinh dưỡng, phức hợp có nguồn gốc biển mạnh này hỗ trợ Collagen tự nhiên và mang lại vẻ trẻ trung đầy đặn.

            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>4,'iddanhmuc'=>4,'idthuonghieu'=>9,'name'=>'LA MER The Lip Balm - Sáp dưỡng môi cao cấp', 'slug'=> Str::slug('LA MER The Lip Balm - Sáp dưỡng môi cao cấp', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=> 'Sáp dưỡng môi luôn nằm trong danh sách những sản phẩm dưỡng môi tốt nhất thời đại của Thế Giới.','noidung'=>'Làm mới làn da môi ngay từ lần sử dụng đầu tiên, sáp dưỡng này đưa vào môi một độ ẩm sâu, khiến chúng mềm mại, mịn màng và đầy đặn.

            - Ngay lập tức làm mềm độ nhám, nuôi dưỡng và giúp làm dịu sự khô da môi nghiêm trọng.

            - Phức hợp Lipid được cấp bằng sáng chế giúp phục hồi và tăng cường hàng rào độ ẩm tự nhiên và ngăn ngừa tác hại từ môi trường.

            - Nồng độ cao Miracle BrothTM  sẽ tái tạo và làm mới làn da một cách tinh tế nhất.

            - Hương bạc hà thơm mát.

            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>5,'iddanhmuc'=>5,'idthuonghieu'=>9,'name'=>'LA MER The Eye Concentrate - Kem dưỡng mắt tập trung', 'slug'=> Str::slug('LA MER The Eye Concentrate - Kem dưỡng mắt tập trung', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=> 'Kem mắt tập trung giúp cải thiện rõ rệt quầng thâm và làm mờ các nếp nhăn đồng thời ngăn ngừa thiệt hại trong tương lai với công thức mới dưỡng ẩm sâu.','noidung'=>'Kem mắt cô đặc mang lại một đôi mắt trẻ trung đầy sức sống và tươi sáng, nơi dễ bị tác động nhất bởi tác hại của thời gian và môi trường.

            - Với gấp ba lần lượng "thuốc tiên" Miracle Broth™ so với phiên bản cũ, truyền vào da nguồn năng lượng thiết yếu và hydrat hóa chữa lành, hỗ trợ đổi mới cho vùng mắt mịn màng và sáng hơn.

            - Chiết xuất trà chanh được biết đến là một chất chống oxy hoá mạnh mẽ độc quyền của La Mer giúp ngăn ngừa sự lão hoá, nếp nhăn, quầng thâm và đồi mồi trong tương lai trước khi nó bắt đầu.

            - Chiết xuất lên men từ tảo bẹ có nguồn gốc từ vùng nước tinh khiết của đảo Jeju Hàn Quốc khôi phục lại sự cân bằng cho một cái nhìn mạnh mẽ và tái sinh.

            - Hematite - một loại khoáng chất giàu sắt, tích điện từ giúp cải thiện rõ rệt quầng thâm, cải thiện vùng da không đều màu.

            - Radiant Ferment làm sáng, làm rõ và hỗ trợ Colagen và Elastin tự nhiên để tăng cường độ săn chắc.

            - Dụng cụ lăn mắt đi kèm được thiết kế đặc biệt, có đầu bạc ngay lập tức cải thiện vi tuần hoàn tự nhiên để mang lại vẻ ngoài tràn đầy năng lượng.

             Giải pháp cho:

            Quầng thâm
            Da khô
            Nếp nhăn và chân chim
            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.

            ' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>6,'iddanhmuc'=>6,'idthuonghieu'=>9,'name'=>'INVISIBLUR PERFECTING SHIELD BROAD SPECTRUM SPF 30', 'slug'=> Str::slug('INVISIBLUR PERFECTING SHIELD BROAD SPECTRUM SPF 30', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','mota'=>'Với khả năng chống nắng quang phổ rộng cùng công nghệ MuraSol độc quyền, sản phẩm giúp bảo vệ làn da hoàn hảo trước tác hại của tia UV.','noidung'=>'Bảo vệ toàn diện. Nuôi dưỡng đủ đầy. Mặt da nhung mịn. Perfecting Shield Broad Spectrum SPF 30 PA +++ ra đời như thể để xóa nhòa ranh giới giữa sản phẩm chăm sóc da và mỹ phẩm trang điểm, giúp làn da nhận được những gì tuyệt hảo nhất của thiên nhiên và công nghệ. Với chiết xuất những loại peptide từ nấm, giúp các dấu hiệu lão hóa dường như tan biến, để lại nét da trẻ trung và căng đầy.

            Khi dùng độc lập, công thức Soft Focus Complex sẽ làm mờ lỗ chân lông, nếp nhăn và các khuyết điểm khác trên da. Khi sử dụng như kem lót, công thức này sẽ giúp kem nền đạt được hiệu ứng hoàn hảo nhất, và giữ cho lớp trang điểm bền bỉ suốt 12 tiếng*. Invisiblur Perfecting Shield Broad Spectrum SPF 30 PA +++ còn không hề chứa Parabens, Sulfates, Phthalates, Gluten và các thành phần có chiết xuất từ động vật.

            Invisiblur Perfecting Shield Broad Spectrum SPF 30 PA +++ còn là kem chống nắng quang phổ rộng cùng co giúp bạn chống được tất cả ảnh hưởng từ tia UVA và UVB. Hơn cả thế, với dạng thức trong suốt tựa như vô hình trên da, giúp bạn tránh được các vệt trắng mà kem chống nắng thông thường hay mắc phải.

            Thành phần nổi bật:' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL]
        ]);
        DB::table('sanphamchitiet')->insert([
            ['id'=>1,'idsanpham' => 1, 'ml'=> '250', 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000'],
            ['id'=>2,'idsanpham' => 1, 'ml'=> '450', 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '690000'],
            ['id'=>3,'idsanpham' => 1, 'ml'=> '750', 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '890000'],
            ['id'=>4,'idsanpham' => 2, 'ml'=> '250', 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '1500000'],
            ['id'=>5,'idsanpham' => 2, 'ml'=> '450', 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '1600000'],
            ['id'=>6,'idsanpham' => 2, 'ml'=> '750', 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '1800000'],
            ['id'=>7,'idsanpham' => 3, 'ml'=> '250', 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '3600000'],
            ['id'=>8,'idsanpham' => 3, 'ml'=> '450', 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '3800000'],
            ['id'=>9,'idsanpham' => 3, 'ml'=> '750', 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '4000000'],
            ['id'=>10,'idsanpham' => 4, 'ml'=> '250', 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '1650000'],
            ['id'=>11,'idsanpham' => 4, 'ml'=> '450', 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '1850000'],
            ['id'=>12,'idsanpham' => 4, 'ml'=> '750', 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '2000000'],
            ['id'=>13,'idsanpham' => 5, 'ml'=> '250', 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '4700000'],
            ['id'=>14,'idsanpham' => 5, 'ml'=> '450', 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '4800000'],
            ['id'=>15,'idsanpham' => 5, 'ml'=> '750', 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '5000000'],
        ]);
        DB::table('donhangchitiet')->insert([
            ['id'=>1,'iddonhang' => 1, 'idsanphamchitiet'=> 1, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '590000','dongiasaugiamgia'=>'550000'],
            ['id'=>2,'iddonhang' => 1, 'idsanphamchitiet'=> 2, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '690000','dongiasaugiamgia'=>'650000'],
            ['id'=>3,'iddonhang' => 1, 'idsanphamchitiet'=> 3, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '890000','dongiasaugiamgia'=>'850000'],
            ['id'=>4,'iddonhang' => 2, 'idsanphamchitiet'=> 4, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1500000','dongiasaugiamgia'=>'1450000'],
            ['id'=>5,'iddonhang' => 2, 'idsanphamchitiet'=> 5, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1600000','dongiasaugiamgia'=>'155000'],
            ['id'=>6,'iddonhang' => 2, 'idsanphamchitiet'=> 6, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1800000','dongiasaugiamgia'=>'1700000'],
            ['id'=>7,'iddonhang' => 3, 'idsanphamchitiet'=> 7, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '3600000','dongiasaugiamgia'=>'3100000'],
            ['id'=>8,'iddonhang' => 3, 'idsanphamchitiet'=> 8, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '3800000','dongiasaugiamgia'=>'375000000'],
            ['id'=>9,'iddonhang' => 3, 'idsanphamchitiet'=> 9, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '4000000','dongiasaugiamgia'=>'3900000'],
        ]);
        DB::table('giohang')->insert([
            ['id'=>1,'idkhachhang' => 1],
            ['id'=>2,'idkhachhang' => 2],
            ['id'=>3,'idkhachhang' => 3],
            ['id'=>4,'idkhachhang' => 4],
            ['id'=>5,'idkhachhang' => 5],
        ]);
        DB::table('giohangchitiet')->insert([
            ['id'=>1,'idgiohang' => 1, 'idsanphamchitiet'=> 1,'soluong' => 2],
            ['id'=>2,'idgiohang' => 1, 'idsanphamchitiet'=> 2,'soluong' => 2],
            ['id'=>3,'idgiohang' => 2, 'idsanphamchitiet'=> 3,'soluong' => 3],
            ['id'=>4,'idgiohang' => 2, 'idsanphamchitiet'=> 4,'soluong' => 3],
            ['id'=>5,'idgiohang' => 3, 'idsanphamchitiet'=> 5,'soluong' => 4],
            ['id'=>6,'idgiohang' => 3, 'idsanphamchitiet'=> 6,'soluong' => 4],
            ['id'=>7,'idgiohang' => 4, 'idsanphamchitiet'=> 1,'soluong' => 5],
            ['id'=>8,'idgiohang' => 5, 'idsanphamchitiet'=> 2,'soluong' => 5],
        ]);
        DB::table('lieutrinh')->insert([
            ['id'=>1,'idnhanvien'=>1,'idkhachhang'=>6,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>2,'idnhanvien'=>2,'idkhachhang'=>5,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>3,'idnhanvien'=>3,'idkhachhang'=>4,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>4,'idnhanvien'=>4,'idkhachhang'=>3,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu' =>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>5,'idnhanvien'=>5,'idkhachhang'=>2,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>6,'idnhanvien'=>6,'idkhachhang'=>1,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>7,'idnhanvien'=>1,'idkhachhang'=>2,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>8,'idnhanvien'=>2,'idkhachhang'=>3,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>9,'idnhanvien'=>3,'idkhachhang'=>4,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>10,'idnhanvien'=>4,'idkhachhang'=>5,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>11,'idnhanvien'=>5,'idkhachhang'=>6,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>12,'idnhanvien'=>6,'idkhachhang'=>1,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>13,'idnhanvien'=>1,'idkhachhang'=>4,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>14,'idnhanvien'=>2,'idkhachhang'=>2,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>15,'idnhanvien'=>3,'idkhachhang'=>3,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>16,'idnhanvien'=>4,'idkhachhang'=>5,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>17,'idnhanvien'=>5,'idkhachhang'=>6,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>18,'idnhanvien'=>6,'idkhachhang'=>1,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>19,'idnhanvien'=>1,'idkhachhang'=>2,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>20,'idnhanvien'=>2,'idkhachhang'=>3,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>21,'idnhanvien'=>3,'idkhachhang'=>4,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ['id'=>22,'idnhanvien'=>4,'idkhachhang'=>5,'ngaybatdau'=>'1635699600','dukienketthuc'=>'1637341200','ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
        ]);
        DB::table('lieutrinhchitiet')->insert([
            ['id'=>1,'idlieutrinh' =>1, 'iddichvu'=>1,'idnhanvien'=>1, 'ghichu' =>'Bước 1: Kiểm tra tình trạng da trong quy trình chăm sóc da cơ bản tại spa mà bạn nên áp dụng vào cơ sở của mình hoặc tham khảo để lựa chọn spa sử dụng dịch vụ. Giá dịch vụ cũng phụ thuộc rất nhiều vào chất lượng của từng spa nên bạn cần lựa chọn kỹ lưỡng để chăm sóc làn da của mình nhé!', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang1.jpg'],
            ['id'=>2,'idlieutrinh' =>2, 'iddichvu'=>2,'idnhanvien'=>2, 'ghichu' =>'Các bước chuẩn bị xăm, phun môi:

            Chọn màu môi, dáng môi
            Tiêm 1-2 mũi thuốc tê vào môi
            Đợi 15 phút cho ngấm thuốc tê
            Kỹ thuật viên sẽ tiến hành công đoạn xăm, phun môi
            Kỹ thuật xăm, phun môi:

            Chiếc máy phun to bằng cây bút bi lớn có gắn đầu kim nhỏ như sợi cước.
            Từng mũi kim tỳ lên môi đâm vào lớp da mỏng mảnh trên môi để tô vào lớp mô bên trong một lớp màu.
            Mũi kim nhỏ do vậy các đường viền môi và các điểm màu trên môi cũng mảnh, mềm mại và mịn màng.
            Lưu ý khi xăm, phun môi:

            Màu môi không căn cứ vào thị hiếu thời trang mà được căn cứ vào màu da của từng người
            Không nên chọn những màu quá đỏ, sẽ khó đánh loại son khác nếu chúng ta muốn có chút thay đổi. Xu hướng chung là chọn gram màu nhẹ nhàng
            Không nên chọn màu có thiên hướng quá cam vì sau khi ngả màu, màu môi sẽ hơi vàng
            Nên chọn màu đỏ không pha để khi xuống màu nó sẽ thành đỏ hoặc hồng.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang2.jpg'],
            ['id'=>3,'idlieutrinh' =>3, 'iddichvu'=> 3,'idnhanvien'=>3, 'ghichu' =>'Bước 1: Làm sạch

            Bước đầu tiên này nên thực hiện vào mỗi buổi sáng và buổi tối.

            Tốt nhất nên tìm loại sửa rửa mặt chứa đầy đủ các loại vitamin nuôi dưỡng da, chẳng hạn như vitamin A, vitamin B2, vitamin B12 và vitamin E.

            Bước 2: Tẩy tế bào chết

            Chất tẩy tế bào chết không nên làm hàng ngày. Thay vào đó, 1–3 lần mỗi tuần là đủ để loại bỏ tế bào chết trên da mà không gây kích ứng.

            Vào những ngày bạn không tẩy tế bào chết, chỉ cần sử dụng sữa rửa mặt của bạn.

            Bước 3: Sử dụng toner - nước cân bằng

            Toner là một trong những bước phổ biến nhất không thể thiếu khi chăm sóc da. Toner có thể giúp se khít lỗ chân lông, loại bỏ tạp chất và cân bằng lại làn da của bạn.

            Các lựa chọn tốt nhất là làm rõ các loại toner giúp cân bằng lại độ pH của bạn. Bạn có thể lưu ý một số loại chiết xuất từ tự nhiên như nho, đào, trà xanh...

            Viện Y tế Quốc gia Hoa kỳ cho biết, việc sử dụng phiên bản đường uống của chiết xuất hạt nho (proanthocyanidin) đã cho thấy cải thiện tình trạng nám da, nguyên nhân gây tăng sắc tố da.

            Bước 4: Dưỡng ẩm

            Ceramides là thành phần quan trọng cần tìm trong kem dưỡng ẩm.

            Cụ thể, hãy tìm phytoceramides, là những ceramides có nguồn gốc thực vật. Đây là những chất béo dạng sáp được tìm thấy tự nhiên trong da có khả năng giữ ẩm.

            Dầu jojoba là một thành phần dưỡng ẩm tuyệt vời khác giúp tăng cường sự trẻ hóa và bảo vệ chống lại các tác nhân gây hại từ môi trường.

            Còn serum về cơ bản là chất dưỡng ẩm cấp độ tiếp theo. Chúng cung cấp các thành phần hoạt tính sâu vào các lớp hạ bì. Bạn có thể sử dụng một vài giọt huyết thanh trên má, cằm, mũi và trán của bạn.

            Bước 5: Kem chống nắng

            SPF được khuyến nghị hàng ngày ở mọi lứa tuổi.

            Một lưu ý đó là bạn nên thoa một loại kem dưỡng bằng chất lỏng nhẹ trước ví dụ như huyết thanh, kem dưỡng ẩm, sau đó mới đến kem chống nắng.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang3.jpg'],
            ['id'=>4,'idlieutrinh' =>4, 'iddichvu'=>4,'idnhanvien'=>4, 'ghichu' =>'1. Bước 1: Làm sạch và sát khuẩn da mặt
            Đây là bước cơ bản cho tất cả các liệu trình chăm sóc và điều trị da liễu. Làm sạch da sẽ loại bỏ vi khuẩn trú ngụ trên da, hạn chế tối đa vi khuẩn xâm nhập sâu vào nang lông trong khi nặn mụn.
            Bước làm sạch này thường sử dụng:

            Tẩy trang: Dùng trong trường hợp trang điểm, chống nắng hoặc trường hợp da dầu, bụi bẩn cần làm sạch sâu.
            Sữa rửa mặt: Sử dụng sữa rửa mặt dịu nhẹ, phù hợp với làn da để loại bỏ bụi bẩn, bã nhờn, vi khuẩn.
            Thuốc sát trùng: Dùng trong một số trường hợp da có nguy cơ nhiễm trùng cao, thuốc sát trùng sẽ ngăn vi khuẩn từ bên ngoài xâm nhập vào gây nhiễm trùng.
            2. Bước 2: Vệ sinh dụng cụ nặn mụn
            Vệ sinh dụng cụ ở đây bao gồm rửa sạch, khử trùng tay, tiệt trùng các dụng cụ dùng trong quá trình nặn mụn.
            Tất cả các dụng cụ hay đồ dùng trong quá trình nặn mụn cần phải sạch sẽ, không có vi khuẩn. Vùng da khi nặn mụn là vết thương hở nên rất dễ bị nhiễm trùng, cần ngăn chặn mọi con đường xâm nhập của vi khuẩn.
            3. Bước 3: Xông hơi để mở lỗ chân lông
            Xông hơi cũng là bước quan trọng giúp các nang lông nở ra, quá trình lấy nhân mụn sẽ dễ dàng và ít đau hơn. Xông hơi cũng là cách loại bỏ bụi bẩn trong lỗ chân lông, giúp da sạch sẽ, thông thoáng và đàn hồi tốt hơn.
            Đối với những người có vết chai, xông hơi cũng là một cách giúp làm mềm các nốt mụn. Mụn nang thường có đầu mụn bị chai, khó tác động để lấy nhân mụn nên xông hơi nước nóng sẽ hỗ trợ quá trình lấy nhân mụn dễ dàng hơn.
            Thông thường, tại các trung tâm da liễu sẽ có các thiết bị chuyên dụng để xông hơi. Nguyên liệu sử dụng có thể là muối khoáng hoặc các loại thảo dược lành tính cho da.
            4. Bước 4: Nặn mụn cám
            Các bác sĩ da liễu có thể tự tay nặn hoặc dùng dụng cụ nặn mụn để lấy nhân mụn ra. Trong đó, phổ biến nhất là sử dụng que nặn mụn.
            Đầu nhọn của que lấy mụn sẽ dùng để châm đầu mụn, đầu tròn còn lại dùng để ấn xuống để đẩy nhân mụn ra ngoài. Thao tác nặn mụn sẽ dùng lực vừa phải để vừa đẩy nhân mụn ra ngoài mà không gây tổn thương nhiều cho da.
            5. Bước 5: Sát khuẩn và chăm sóc da sau mụn
            Sau khi nặn mụn, các chuyên gia, bác sĩ sẽ sát trùng vị trí mụn. Dung dịch thường được sử dụng là nước muối sinh lý hoặc các dung dịch sát khuẩn chuyên dụng như Povidine 10% để ngăn ngừa nhiễm trùng, nhiễm vi khuẩn.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang4.jpg'],
            ['id'=>5,'idlieutrinh' =>5, 'iddichvu'=>5,'idnhanvien'=>5, 'ghichu' =>'Thời gian thực hiện và các bước trong liệu trình Điều Trị Mụn Lưng tại Fbeauty
            Bước 1: Rửa và làm sạch các lớp bụi bẩn trên bề mặt da

            Bước 2: Tẩy tế bào chết giúp loại bỏ lớp tế bào già cội sần sùi thô ráp, đồng thời làm thông thoáng lỗ chân lông để các bước điều trị tiếp theo hiệu quả hơn.

            Bước 3: Xông hơi giúp giãn nở lỗ chân lông, làm bước đệm cho quá trình lấy nhân mụn tiếp theo.

            Bước 4: Hút mụn cám và loại bỏ bã nhờn ẩn sâu dưới lỗ chân lông

            Bước 5: Tiến hành lấy nhân mụn triệt để bằng các dụng cụ chuyên dùng, mỗi bộ dụng cụ chỉ sử dụng 1 lần duy nhất cho từng khách hàng

            Bước 6: Sát trùng bằng thuốc chuyên biệt cho liệu trình

            Bước 7: Đắp mặt nạ thuốc bắc giúp dịu vết mụn đỏ, kiểm soát bã nhờn.

            Bước 8: Thắp ánh sáng sinh học ức chế tuyến bã nhờn, hạn chế nhiễm trùng vết thương, giảm kích ứng da, làm diệu và giảm đau, phục hồi tế bào da hư tổn, kích thích tuần hoàn máu, tái tạo da.

            Bước 9: Phun oxy giúp làm sạch sâu, bổ sung dưỡng chất cần thiết nuôi dưỡng một làn da tươi sáng, khỏe mạnh từ bên trong đồng thời ngăn chặn mọi quá trình lão hóa', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang5.jpg'],
            ['id'=>6,'idlieutrinh' =>6, 'iddichvu'=>1,'idnhanvien'=>6, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>7,'idlieutrinh' =>7, 'iddichvu'=> 1,'idnhanvien'=> 1, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>8,'idlieutrinh' => 8, 'iddichvu'=> 2,'idnhanvien'=> 2, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>9,'idlieutrinh' => 9, 'iddichvu'=> 3,'idnhanvien'=> 3, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],

            ['id'=>10,'idlieutrinh' => 10, 'iddichvu'=> 6,'idnhanvien'=> 6, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>11,'idlieutrinh' => 11, 'iddichvu'=> 1,'idnhanvien'=> 1, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>12,'idlieutrinh' => 12, 'iddichvu'=> 2,'idnhanvien'=> 2, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>13,'idlieutrinh' => 13, 'iddichvu'=> 3,'idnhanvien'=> 3, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>14,'idlieutrinh' => 14, 'iddichvu'=> 4,'idnhanvien'=> 4, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>15,'idlieutrinh' => 15, 'iddichvu'=> 5,'idnhanvien'=> 5, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>16,'idlieutrinh' => 16, 'iddichvu'=> 6,'idnhanvien'=> 6, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>17,'idlieutrinh' => 17, 'iddichvu'=> 1,'idnhanvien'=> 1, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>18,'idlieutrinh' => 18, 'iddichvu'=> 2,'idnhanvien'=> 2, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>19,'idlieutrinh' => 19, 'iddichvu'=> 3,'idnhanvien'=> 3, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],

            ['id'=>20,'idlieutrinh' => 20, 'iddichvu'=> 5,'idnhanvien'=> 5, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>21,'idlieutrinh' => 21, 'iddichvu'=> 6,'idnhanvien'=> 6, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
            ['id'=>22,'idlieutrinh' => 22, 'iddichvu'=> 6,'idnhanvien'=> 6, 'ghichu' =>'Bước 1: Vệ sinh mắt, rửa mắt với nước muối
            Bước đầu của quy trình phun xăm mí mắt để đảm bảo an toàn, khách hàng sẽ được rửa vệ sinh mắt bằng nước muối sinh lý. Đây là bước cần thiết, chuẩn bị cho quy trình phun xăm mí mắt được tốt hơn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 2: Làm sạch bằng mỡ kháng sinh
            Việc làm sạch mắt bằng mỡ kháng sinh sẽ giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng hơn.

            Bước 3: Bôi tê và gây ê nhẹ ngoài da
            Quy trình phun xăm mí mắt với gây tê là bước không thể thiếu giúp cho quy trình phun xăm mí mắt diễn ra suôn sẻ, nhẹ nhàng, không gây đau đớn.

            QUY TRÌNH PHUN XĂM MÍ MẮT HÀN QUỐC

            Bước 4: Phun mực xăm lên và viền mí

            Lúc này, chuyên viên phun xăm sẽ di một nét nhỏ theo đường viền mi mắt. Đây là bước quan trọng, đòi hỏi sự tinh tế cao trong suốt quy trình phun xăm mí mắt.
            Thời gian xăm mí mắt thường lâu hơn thời gian xăm mày, xăm môi vì mí mắt rất gần với mắt nên đòi hỏi kỹ thuật viên phải thật nhẹ nhàng, tỉ mỉ hơn để an toàn cho mắt. Thông thường thời gian phun (xăm) cả mí trên, mí dưới là 45 phút.', 'ngay' => '29102022','trangthai' => 0, 'imgkhachhang'=>'khachhang6.jpg'],
        ]);
        DB::table('hoadon')->insert([
            ['id'=>1,'idkhachhang' => 1, 'idcoso'=> 1, 'idnhanvien'=> 1, 'idthungan' => 1,'idlieutrinh'=> 1,'idgiamgia'=> 1, 'tongtientruocgiamgia'=> '1500000','tongtiensaugiamgia'=>'1450000', 'trangthai'=>0, 'ghichu'=>'dịch vụ rất đa dạng và bắt mắt '],
            ['id'=>2,'idkhachhang' => 2, 'idcoso'=> 2, 'idnhanvien'=> 2, 'idthungan' => 2,'idlieutrinh'=> 2,'idgiamgia'=> 2, 'tongtientruocgiamgia'=> '3600000','tongtiensaugiamgia'=>'3400000', 'trangthai'=>1, 'ghichu'=>'dịch vụ rất đa dạng '],
            ['id'=>3,'idkhachhang' => 3, 'idcoso'=> 2, 'idnhanvien'=> 3, 'idthungan' => 3,'idlieutrinh'=> 3,'idgiamgia'=> 3, 'tongtientruocgiamgia'=> '4000000','tongtiensaugiamgia'=>'45000000', 'trangthai'=>1, 'ghichu'=>'dịch vụ rất đa dạng '],
            ['id'=>4,'idkhachhang' => 4, 'idcoso'=> 1, 'idnhanvien'=> 4, 'idthungan' => 4,'idlieutrinh'=> 3,'idgiamgia'=> 1, 'tongtientruocgiamgia'=> '16000000','tongtiensaugiamgia'=>'15000000', 'trangthai'=>0, 'ghichu'=>'dịch vụ rất đa dạng '],
            ['id'=>5,'idkhachhang' => 5, 'idcoso'=> 2, 'idnhanvien'=> 5, 'idthungan' => 5,'idlieutrinh'=> 2,'idgiamgia'=> 2, 'tongtientruocgiamgia'=> '3800000','tongtiensaugiamgia'=>'35000000', 'trangthai'=>1, 'ghichu'=>'dịch vụ rất đa dạng '],
            ['id'=>6,'idkhachhang' => 6, 'idcoso'=> 2, 'idnhanvien'=> 6, 'idthungan' => 6,'idlieutrinh'=> 2,'idgiamgia'=> 3, 'tongtientruocgiamgia'=> '10000000','tongtiensaugiamgia'=>'9000000', 'trangthai'=>1, 'ghichu'=>'dịch vụ rất đa dạng '],
        ]);
          DB::table('hoadonchitiet')->insert([
            ['id'=>1,'idhoadon'=>1,'idlienquan'=>1,'type'=>0,'soluong'=>'2','dongiatruocgiamgia'=>'15000000','dongiasaugiamgia'=>'14000000'],
            ['id'=>2,'idhoadon'=>2,'idlienquan'=>2,'type'=>1,'soluong'=>'2','dongiatruocgiamgia'=>'18000000','dongiasaugiamgia'=>'17500000'],
            ['id'=>3,'idhoadon'=>3,'idlienquan'=>3,'type'=>0,'soluong'=>'2','dongiatruocgiamgia'=>'21000000','dongiasaugiamgia'=>'20000000'],
            ['id'=>4,'idhoadon'=>4,'idlienquan'=>4,'type'=>1,'soluong'=>'2','dongiatruocgiamgia'=>'30000000','dongiasaugiamgia'=>'29500000'],
        ]);
           DB::table('theodoi')->insert([
            ['id'=>1,'email'=>'ly@gmail.com'],
            ['id'=>2,'email'=>'huong@gmail.com'],
            ['id'=>3,'email'=>'thao@gmail.com'],
            ['id'=>4,'email'=>'thaomai@mail.com'],
        ]);
        DB::table('yeuthich')->insert([
            ['id'=>1,'idkhachhang'=>1,'idsanphamchitiet'=>1],
            ['id'=>2,'idkhachhang'=>2,'idsanphamchitiet'=>2],
            ['id'=>3,'idkhachhang'=>1,'idsanphamchitiet'=>3],
            ['id'=>4,'idkhachhang'=>2,'idsanphamchitiet'=>4],
            ['id'=>5,'idkhachhang'=>1,'idsanphamchitiet'=>5],
            ['id'=>6,'idkhachhang'=>2,'idsanphamchitiet'=>6],
        ]);


    }
}

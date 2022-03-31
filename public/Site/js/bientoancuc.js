const serverNameUrl = $('#server-name').val();
const getNhanVienByIdCoSoUrl = serverNameUrl + 'nhanviencuacoso/'; // nhanviencuacoso/id
const getGioTheoThuUrl = serverNameUrl + 'getDataKhungGio/'; // getGio/{thu}
const postDatLichUrl = serverNameUrl + 'datLich/';
const rootUrlImage = '/Site/images/';
const rootUrlUploadImage = '/uploads/imgusers/';
const checkIssetUserUrl = serverNameUrl + 'checkIssetUser';
const siteLoginUrl = serverNameUrl + 'site-login';
const sendOTPSMSUrl = serverNameUrl + 'sendOTPSMS';
const removeOTPUrl = serverNameUrl + 'removeOTP';
const checkOTPUrl = serverNameUrl + 'checkOTP';
const newPasswordUrl = serverNameUrl + 'newPassword';
const getBlogsPagiUrl = serverNameUrl + 'getBlogsPagi';
const skipCreatePasswordUrl = serverNameUrl + 'skipCreatePassword';
const linkThongTinUser = serverNameUrl + 'thong-tin-tai-khoan';
const trangThaiNhanVienHoatDong = 1;
const timeMoving = 100;
const lengthSlideBooking = $('.datlich-step').length;
const tranlatexRange = 100 / parseInt(lengthSlideBooking);
const maxStep = lengthSlideBooking - 1; // bắt đầu từ 0 => - 1

const elementDatePick = $('.date-click');
const attrOptionDate = 'data-option-date';
const attrValueDate = 'data-date';

const elementNhanVienPick = $('.picknhanvien');
const attrOptionNhanVien = 'data-option-nhanvien';
const attrValueNhanVien = 'data-nhanvien';
const classGetTextNhanVien = 'name-nhanvien';
const classClickedNhanVien = 'option-nhanvien';
const elementValueNhanVien = $('.value-nhanvien');

const attrOptionTime = 'data-option-time';
const attrValueTime = 'data-time';
const classError = 'fa-error';

var controlShortOne = $('[data-step=0]');
var controlShortTwo = $('[data-step=1]');
var controlShortThree = $('[data-step=2]');
var controlShortFour = $('[data-step=3]');
var boxSpinner = $('.box-spinner');
const step_1 = 0;
const step_2 = 1;
const step_3 = 2;
const step_4 = 3;

var elementPickCoSo = $('.pickcoso');
var attrOptionCoSo = 'data-option-coso';
var elementValueCoSo = $('.value-coso');
var attrValueCoSo = 'data-coso';

var elementListNhanVien = $('.list-nhanvien');

var elementValueTime = $('.value-time');

const trangThaiLichSanSang = 0;

var totalPriceDichVu = 0;

var todayDMY = moment().format('DD/MM/YYYY');

var todayYMD = moment().format('YYYY-MM-DD');

var currentTime = moment().format('HH:mm:ss');

var gioiHanDatLich = moment().add(10, 'minutes').format('HH:mm:ss');

var idCoSo;

var phoneNumber;

var soXuLiBatDongBo = 0;

var ngaySelected = todayDMY;

var nhanVienSelected = 0;

var nameKhachHang = '';

var timeSelected = '';

var khungGio;

var objectNhanVienSelected = {
    'id': '0',
    'ten': 'Spa chọn chuyên viên giúp bạn',
    'imgUrl': 'chuyenvienspa.png'
};

var activeStep;
var nextStep;

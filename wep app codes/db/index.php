<script>
    
    // دالة لتحديث البيانات عبر AJAX كل 0.1 ثانية
function updateData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getdata.php", true); // طلب البيانات من الملف PHP

    xhr.onload = function() {
        if (xhr.status === 200) {
            // تحويل البيانات المستلمة من JSON إلى كائن JavaScript
            var data = JSON.parse(xhr.responseText);

            // تحويل البيانات بتنسيق JSON لتظهر بشكل مرتب
            var output = JSON.stringify(data, null, 2);

            // عرض البيانات في الصفحة
            document.body.textContent = output;

            // طباعة النتيجة في الكونسول
            console.log("تم تحديث البيانات:");
            console.log(data);  // طباعة الكائن في الكونسول بتنسيق JSON
        } else {
            console.error("فشل في تحميل البيانات، رمز الخطأ: " + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error("حدث خطأ في الاتصال بخادم البيانات.");
    };

    xhr.send();
}

// استدعاء الدالة لتحديث البيانات كل 100 ملي ثانية (0.1 ثانية)
setInterval(updateData, 100); // تحديث البيانات كل 0.1 ثانية

</script>
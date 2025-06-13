// Lấy ra các phần tử
    const btnMinus = document.querySelector('.button_detail_left');
    const btnPlus = document.querySelector('.button_detail_right');
    const qtyInput = document.querySelector('.qty_val');
    const qualityStock = parseInt('{{ $product->qualityStock ?? 0 }}'); // Lấy số lượng tồn kho từ server

    btnMinus.addEventListener('click', () => {
        let currentValue = parseInt(qtyInput.value) || 0;
        if (currentValue > 1) {
            qtyInput.value = currentValue - 1;
        }
    });

    btnPlus.addEventListener('click', () => {
        let currentValue = parseInt(qtyInput.value) || 0;
        if (currentValue < qualityStock) {
            qtyInput.value = currentValue + 1;
        }
    });
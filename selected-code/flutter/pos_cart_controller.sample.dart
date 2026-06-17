// Sanitized Flutter sample for public showcase purposes.
// This is not the complete production implementation.

class PosCartItem {
  PosCartItem({
    required this.productId,
    required this.productName,
    required this.price,
    required this.quantity,
    required this.availableStock,
  });

  final int productId;
  final String productName;
  final int price;
  final int quantity;
  final int availableStock;

  int get subtotal => price * quantity;

  PosCartItem copyWith({
    int? quantity,
  }) {
    return PosCartItem(
      productId: productId,
      productName: productName,
      price: price,
      quantity: quantity ?? this.quantity,
      availableStock: availableStock,
    );
  }
}

class PosCartState {
  const PosCartState({
    this.items = const [],
    this.customerId,
    this.paymentMethodId,
  });

  final List<PosCartItem> items;
  final int? customerId;
  final int? paymentMethodId;

  int get grandTotal {
    return items.fold<int>(0, (total, item) => total + item.subtotal);
  }

  bool get canSubmit {
    return items.isNotEmpty && paymentMethodId != null;
  }

  PosCartState copyWith({
    List<PosCartItem>? items,
    int? customerId,
    int? paymentMethodId,
  }) {
    return PosCartState(
      items: items ?? this.items,
      customerId: customerId ?? this.customerId,
      paymentMethodId: paymentMethodId ?? this.paymentMethodId,
    );
  }
}

class PosCartController {
  PosCartState _state = const PosCartState();

  PosCartState get state => _state;

  void addItem(PosCartItem item) {
    final index = _state.items.indexWhere(
      (existing) => existing.productId == item.productId,
    );

    if (index == -1) {
      _state = _state.copyWith(items: [..._state.items, item]);
      return;
    }

    final current = _state.items[index];
    final nextQuantity = current.quantity + item.quantity;

    if (nextQuantity > current.availableStock) {
      throw StateError('Quantity cannot exceed available stock.');
    }

    final updatedItems = [..._state.items];
    updatedItems[index] = current.copyWith(quantity: nextQuantity);

    _state = _state.copyWith(items: updatedItems);
  }

  void removeItem(int productId) {
    _state = _state.copyWith(
      items: _state.items
          .where((item) => item.productId != productId)
          .toList(),
    );
  }

  void selectPaymentMethod(int paymentMethodId) {
    _state = _state.copyWith(paymentMethodId: paymentMethodId);
  }

  void clear() {
    _state = const PosCartState();
  }
}

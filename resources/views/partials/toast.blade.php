{{-- Toast notification --}}
<div class="toast" id="toast" role="alert" aria-live="assertive">
  <i class="fas fa-check-circle toast-ico"></i>
  <span id="toast-msg"></span>
</div>

<style>
.toast {
  position: fixed;
  bottom: clamp(14px, 2.5vw, 24px);
  right:  clamp(14px, 2.5vw, 24px);
  z-index: 9999;
  background: var(--ink-3);
  border: 1px solid var(--amber-b);
  padding: 13px 20px;
  color: var(--t-primary);
  display: flex;
  align-items: center;
  gap: 10px;
  max-width: min(300px, 90vw);
  box-shadow: 0 10px 36px rgba(0,0,0,.7);
  transform: translateY(90px);
  opacity: 0;
  transition: all .4s var(--e1);
  font-family: var(--sans);
  font-size: .86rem;
  font-weight: 400;
}
.toast.show { transform: translateY(0); opacity: 1; }
.toast.err  { border-color: rgba(200,85,85,.38); }
.toast-ico  { color: var(--amber); font-size: .95rem; }
.toast.err .toast-ico { color: var(--red); }
</style>

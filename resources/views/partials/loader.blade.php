{{-- Page loader --}}
<div id="loader" role="status" aria-label="Loading portfolio">
  <div class="ldr-inner">
    <div class="ldr-mark">{{ Str::upper(substr($portfolio->name ?? 'Vikash Kumar', 0, 1)) }}{{ Str::upper(substr(Str::after($portfolio->name ?? 'Vikash Kumar', ' '), 0, 1)) }}.</div>
    <div class="ldr-sub">{{ $portfolio->title ?? 'Laravel Developer' }} &nbsp;·&nbsp; {{ date('Y') }}</div>
    <div class="ldr-bar"><div class="ldr-prog"></div></div>
  </div>
</div>

<style>
#loader {
  position: fixed; inset: 0;
  z-index: 9000;
  background: var(--ink-0);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  transition: opacity .85s var(--e1), visibility .85s;
}
#loader.out {
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
}
.ldr-inner {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0;
}
.ldr-mark {
  font-family: var(--serif);
  font-weight: 700;
  font-style: italic;
  font-size: clamp(5rem, 15vw, 10rem);
  line-height: .82;
  letter-spacing: -3px;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl) 45%, var(--amber) 75%, var(--amber-l));
  background-size: 220%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: shimmer 3s linear infinite;
}
.ldr-sub {
  font-family: var(--mono);
  font-size: clamp(.5rem,.72vw,.62rem);
  letter-spacing: 5px;
  color: var(--t-muted);
  margin-top: 18px;
  animation: slideUp .5s .3s both;
}
.ldr-bar {
  width: 120px; height: 1px;
  background: rgba(200,134,10,.1);
  margin-top: 28px; overflow: hidden;
}
.ldr-prog {
  height: 100%;
  background: linear-gradient(90deg, transparent, var(--amber), transparent);
  animation: ldrSweep 2.8s var(--e1) forwards;
}
@keyframes ldrSweep {
  from { width: 0; margin-left: 0; }
  to   { width: 100%; margin-left: 0; }
}
</style>
